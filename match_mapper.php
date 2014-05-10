<?php
require 'match.php';

class MatchMapper
{
    private static function buildResource($query)
    {
        $link = mysql_connect('localhost', 'root', '');
        mysql_select_db('wm');
        $resources = mysql_query($query, $link);
        if (!$resources) {
            var_dump(mysql_error());
        }
        mysql_close($link);
        return $resources;
    }

    private static function dbQuery($query)
    {
        $resources = self::buildResource($query);
        $matches = [];
        while($row = mysql_fetch_assoc($resources)) {
            $matches[] = new Match(
                $row['date'], $row['time'], $row['host'], $row['guest'],
                $row['studio'], $row['result'], $row['match']
            );
        }
        return $matches;
    }

    public static function getByDate($date)
    {
        $sql = "select * from matches where date='$date'";
        return self::dbQuery($sql);
    }

    public static function getTodayMatch()
    {
        $now = new DateTime();
        $date = $now->format('Y/n/j');
        return $this->getByDate($date);
    }

    public static function getById($id)
    {
        $sql = "select * from matches where id=$id";
        return self::dbQuery($sql)[0];
    }

    public static function getMatchOfCountry($country)
    {
        $sql = "select * from matches where host='$country' or guest='$country'";
        return self::dbQuery($sql);
    }

    public static function getGroupMatches($group)
    {
        if(!in_array($group, ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'])) {
            throw new Exception("invalid group $group");
        }
        $groupName = $group . '%';
        $sql = "select * from matches where `match` like '$groupName'";
        return self::dbQuery($sql);
    }

    public static function updateMatch($id, $result)
    {
        $sql = "update matches set result = '$result' where id=$id";
        $isSuccessfully = self::buildResource($sql);
        if(!$isSuccessfully) {
            var_dump(mysql_error());
        }
        return $isSuccessfully;
    }
}

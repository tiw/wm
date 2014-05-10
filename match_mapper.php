<?php
require 'match.php';

class MatchMapper
{
    public function __construct($dbConfig)
    {
        $this->link = mysql_connect(
            $dbConfig['host'], $dbConfig['user'], $dbConfig['password']
        );
        mysql_select_db($dbConfig['database']);
    }

    public function tearDown()
    {
        mysql_close($this->link);
    }

    private function buildResource($query)
    {
        $resources = mysql_query($query, $this->link);
        if (!$resources) {
            var_dump(mysql_error());
        }
        return $resources;
    }

    private function dbQuery($query)
    {
        $resources = $this->buildResource($query);
        $matches = [];
        while($row = mysql_fetch_assoc($resources)) {
            $matches[] = new Match(
                $row['date'], $row['time'], $row['host'], $row['guest'],
                $row['studio'], $row['result'], $row['match']
            );
        }
        return $matches;
    }

    public function getByDate($date)
    {
        $sql = "select * from matches where date='$date'";
        return $this->dbQuery($sql);
    }

    public function getTodayMatch()
    {
        $now = new DateTime();
        $date = $now->format('Y/n/j');
        return $this->getByDate($date);
    }

    public function getById($id)
    {
        $sql = "select * from matches where id=$id";
        return $this->dbQuery($sql)[0];
    }

    public function getMatchOfCountry($country)
    {
        $sql = "select * from matches where host='$country' or guest='$country'";
        return $this->dbQuery($sql);
    }

    public function getGroupMatches($group)
    {
        if(!in_array($group, ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'])) {
            throw new Exception("invalid group $group");
        }
        $groupName = $group . '%';
        $sql = "select * from matches where `match` like '$groupName'";
        return $this->dbQuery($sql);
    }

    public function updateMatch($id, $result)
    {
        $sql = "update matches set result = '$result' where id=$id";
        $isSuccessfully = $this->buildResource($sql);
        if(!$isSuccessfully) {
            var_dump(mysql_error());
        }
        return $isSuccessfully;
    }
}

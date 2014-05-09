<?php
require 'match.php';

class MatchMapper
{
    public static function getByDate($date)
    {
        $sql = "select * from matches where date='$date'";
        $link = mysql_connect('localhost', 'root', '');
        mysql_select_db('wm');
        $resources = mysql_query($sql, $link);
        if (!$resources) {
            var_dump(mysql_error());
        }
        mysql_close($link);
        $matches = [];
        while($row = mysql_fetch_assoc($resources)) {
            $matches[] = new Match(
                $row['date'], $row['time'], $row['host'], $row['guest'],
                $row['studio'], $row['result'], $row['match']
            );
        }
        return $matches;
    }

    public static function getTodayMatch()
    {
        $now = new DateTime();
        $date = $now->format('Y/n/j');
        return $this->getByDate($date);
    }
}

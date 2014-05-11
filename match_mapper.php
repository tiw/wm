<?php
require 'match.php';

class MatchMapper
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    private function dbQuery($query, $params)
    {
        $rows = $this->db->fetchAll($query, $params);
        $matches = [];
        foreach($rows as $row) {
            $matches[] = new Match(
                $row['date'], $row['time'], $row['host'], $row['guest'],
                $row['studio'], $row['result'], $row['match']
            );
        }
        return $matches;
    }

    public function getByDate($date)
    {
        $sql = "select * from matches where date=?";
        return $this->dbQuery($sql, [$date]);
    }

    public function getTodayMatch()
    {
        $now = new DateTime();
        $date = $now->format('Y/n/j');
        return $this->getByDate($date);
    }

    public function getById($id)
    {
        $sql = "select * from matches where id=?";
        return $this->dbQuery($sql, [$id])[0];
    }

    public function getMatchOfCountry($country)
    {
        $sql = "select * from matches where host=? or guest=?";
        return $this->dbQuery($sql, [$country, $country]);
    }

    public function getGroupMatches($group)
    {
        if(!in_array($group, ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'])) {
            throw new Exception("invalid group $group");
        }
        $groupName = $group . '%';
        $sql = "select * from matches where `match` like ?";
        return $this->dbQuery($sql, [$groupName]);
    }

    public function updateMatch($id, $result)
    {
        $sql = "update matches set result = ? where id = ?";
        $isSuccessfully = $this->db->executeUpdate($sql, [$result, $id]);
        return $isSuccessfully;
    }
}

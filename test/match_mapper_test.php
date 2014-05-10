<?php

require __DIR__.'/../match_mapper.php';

class MatchMapperTest extends PHPUnit_Framework_TestCase
{
    public function testGetByDate()
    {
        $matches = MatchMapper::getByDate('2014/6/13');
        $this->assertEquals(1, count($matches));
        $this->assertEquals('巴西', $matches[0]->getHostTeam());
        $this->assertEquals('克罗地亚', $matches[0]->getGuestTeam());
        $this->assertEquals('4:00', $matches[0]->getTime());
        $this->assertEquals('22:00', $matches[0]->getGermanTime());
    }

    public function testGetMatchOfCountry()
    {
        $matches = MatchMapper::getMatchOfCountry('德国');
        $this->assertEquals(3, count($matches));
    }

    public function testGetById()
    {
        $match = MatchMapper::getById(1);
        $this->assertEquals('巴西', $match->getHostTeam());
    }

    public function testUpdateMatch()
    {
        $id = 1;
        MatchMapper::updateMatch($id, '1:2');
        $match = MatchMapper::getById($id);
        $this->assertEquals('1:2', $match->getResult());
        MatchMapper::updateMatch($id, '');
        $match = MatchMapper::getById($id);
        $this->assertEquals('', $match->getResult());

    }

    public function testGetGroupMatches()
    {
        $group = 'A';
        $matches = MatchMapper::getGroupMatches($group);
        $this->assertEquals(6, count($matches));
    }
}

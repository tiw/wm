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
}

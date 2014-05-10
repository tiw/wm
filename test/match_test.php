<?php

require __DIR__.'/../match.php';

class MatchTest extends PHPUnit_Framework_TestCase
{
    public function testGetGermanTime()
    {
        $date = '2014/6/16';
        $time =  '0:00';
        $match = new Match($date, $time, '', '', '', '', '');
        $this->assertEquals('18:00', $match->getGermanTime());
    }
}

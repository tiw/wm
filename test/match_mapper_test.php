<?php

require_once __DIR__.'/../match_mapper.php';
require_once __DIR__.'/../silex/vendor/autoload.php';
use \Doctrine\DBAL\DriverManager;

class MatchMapperTest extends PHPUnit_Framework_TestCase
{
    private $mm;

    public function setUp()
    {
        $this->mm = new MatchMapper(
            DriverManager::getConnection([ 
                'driver' => 'pdo_mysql',
                'user' => 'root',
                'password' => '',
                'host' => 'localhost',
                'dbname' => 'wm'
            ]) 
        );
    }

    public function testGetByDate()
    {
        $matches = $this->mm->getByDate('2014/6/13');
        $this->assertEquals(1, count($matches));
        $this->assertEquals('巴西', $matches[0]->getHostTeam());
        $this->assertEquals('克罗地亚', $matches[0]->getGuestTeam());
        $this->assertEquals('4:00', $matches[0]->getTime());
        $this->assertEquals('22:00', $matches[0]->getGermanTime());
    }

    public function testGetMatchOfCountry()
    {
        $matches = $this->mm->getMatchOfCountry('德国');
        $this->assertEquals(3, count($matches));
    }

    public function testGetById()
    {
        $match = $this->mm->getById(1);
        $this->assertEquals('巴西', $match->getHostTeam());
    }

    public function testUpdateMatch()
    {
        $id = 1;
        $this->mm->updateMatch($id, '1:2');
        $match = $this->mm->getById($id);
        $this->assertEquals('1:2', $match->getResult());
        $this->mm->updateMatch($id, '');
        $match = $this->mm->getById($id);
        $this->assertEquals('', $match->getResult());

    }

    public function testGetGroupMatches()
    {
        $group = 'A';
        $matches = $this->mm->getGroupMatches($group);
        $this->assertEquals(6, count($matches));
    }
}

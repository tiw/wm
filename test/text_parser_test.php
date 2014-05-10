<?php

require __DIR__.'/../text_parser.php';

class TextParserTest extends PHPUnit_Framework_TestCase
{
    public function testGetDate()
    {
        $content = "你好 6/23";
        $this->assertEquals('6/23', TextParser::getDate($content));
        $content = "你好 6 23";
        $this->assertEquals('6/23', TextParser::getDate($content));
        $content = "你好 06/23";
        $this->assertEquals('6/23', TextParser::getDate($content));
        $content = "你好 06 23";
        $this->assertEquals('6/23', TextParser::getDate($content));
    }
}

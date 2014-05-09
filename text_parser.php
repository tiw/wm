<?php

class TextParser
{
    public static function getDate($content)
    {
        preg_match('/(0?\d\/\d+)/', $content, $matches);
        if(isset($matches[1])) {
            return str_replace('0', '', $matches[1]);
        } 

        preg_match('/(\d\ \d+)/', $content, $matches);
        if(isset($matches[1])) {
            return str_replace([' ', '0'], ['/', ''], $matches[1]);
        } 

        return null;
    }
}

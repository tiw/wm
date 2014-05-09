<?php

require_once __DIR__ . '/silex/vendor/autoload.php';
require_once __DIR__ . '/match_mapper.php';

$app = new Silex\Application;

$app->get('/matches/{date}', function($date) use($app){
    $matches = MatchMapper::getByDate('2014/' . str_replace('-', '/', $app->escape($date)));
    $re = [];
    array_walk($matches, function($m) use (&$re) {
        $re[] = $m->getHostTeam() . '-' . $m->getGuestTeam();
    });
    return json_encode($re);
});

$app->run();

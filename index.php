<?php

require_once __DIR__ . '/silex/vendor/autoload.php';
require_once __DIR__ . '/match_mapper.php';

$app = new Silex\Application;
$app['debug'] = true;
$app['dbConfig'] = [
    'host'=>'localhost', 'user'=>'root', 'password'=>'', 'database' => 'wm'
];
// like singleton
$app['mm'] = $app->share(function($app) {
    return new MatchMapper($app['dbConfig']);
});
// everytime using $app['mm'] the contructor will be called, new object is created.
//$app['mm'] = function($app) {
    //return new MatchMapper($app['dbConfig']);
//};

$app->get('/matches/{date}', function($date) use($app){
    $matches = $app['mm']->getByDate('2014/' . str_replace('-', '/', $app->escape($date)));
    $re = [];
    array_walk($matches, function($m) use (&$re) {
        $re[] = $m->getHostTeam() . '-' . $m->getGuestTeam();
    });
    return json_encode($re);
});

$app->get('/matches/country/{country}', function($country) use($app){
    $matches = $app['mm']->getMatchOfCountry($country);
    $re = [];
    array_walk($matches, function($m) use(&$re) {
        $re[] = $m->getHostTeam() . '-' . $m->getGuestTeam() . ' at ' . $m->getDate() . ' ' . $m->getTime();
    });
    return json_encode($re);
});


$app->put('/matches/{id}', function($id) {
    
});

$app->run();

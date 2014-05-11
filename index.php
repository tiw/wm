<?php

require_once __DIR__ . '/silex/vendor/autoload.php';
require_once __DIR__ . '/match_mapper.php';

$app = new Silex\Application;
$app['debug'] = true;
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options'=>[
        'driver'=>'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname'=> 'wm',
        'user' => 'root',
        'password' => ''
    ]
]);
// like singleton
$app['mm'] = $app->share(function($app) {
    return new MatchMapper($app['db']);
});
// everytime using $app['mm'] the contructor will be called, new object is created.
//$app['mm'] = function($app) {
    //return new MatchMapper($app['dbConfig']);
//};

// 
$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/dev.log',
    'monolog.level' => 'DEBUG',
]);
$app['monolog']->addDebug('testing monolog');


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


$app->get('/matches/id/{id}', function($id) use($app) {
    $sql  = "select * from matches where id = ?";
    $match = $app['db']->fetchAssoc($sql, [(int) $id]);
    return $app->json($match);
});

$app->run();

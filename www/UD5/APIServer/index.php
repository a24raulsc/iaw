<?php

declare(strict_types=1);

require_once 'flight/Flight.php';
// require 'flight/autoload.php';

Flight::register('db', 'PDO',
array('mysql:host=db;dbname=base','root','root'));

Flight::route('/', function () {
    echo 'hello world!';
});

Flight::route('GET /clientes', function () {
    $setencia = Flight::db()->query('SELECT * FROM clientes');
    $setencia->execute();
    $clientes = $setencia->fetchAll();
    Flight::json($clientes);
});

Flight::start();

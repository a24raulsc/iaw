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

Flight::route('POST /clientes', function () {
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $sql = "INSERT INTO clientes (id, nombre, apellidos, email) VALUES (?, ?, ?, ?)";

    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(1, $id);
    $sentencia->bindParam(2, $nombre);
    $sentencia->bindParam(3, $apellidos);
    $sentencia->bindParam(4, $email);
    
    $sentencia->execute();

    Flight::jsonp(["Cliente agregado correctamente"]);
});

Flight::route('DELETE /clientes', function () {
    $id = Flight::request()->data->id;
    $sql = "DELETE FROM clientes WHERE id = :id";

    $setencia = Flight::db()->prepare($sql);

    $setencia->bindParam(":id", $id);

    $setencia->execute();

    Flight::jsonp(["Cliente borrado correctamente"]);
});

Flight::route('PUT /clientes', function () {
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;
    $sql = "UPDATE clientes SET nombre = ?, apellidos = ?, edad = ?, email = ?, telefono = ? WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);

    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $apellidos);
    $sentencia->bindParam(3, $edad);
    $sentencia->bindParam(4, $email);
    $sentencia->bindParam(5, $telefono);
    $sentencia->bindParam(6, $id);
    
    $sentencia->execute();

    Flight::jsonp(["Cliente modificado correctamente"]);
});

Flight::route('GET /hoteles', function () {
    $setencia = Flight::db()->query('SELECT * FROM hoteles');
    $setencia->execute();
    $hoteles = $setencia->fetchAll();
    Flight::json($hoteles);
});

Flight::route('POST /hoteles', function () {
    $id = Flight::request()->data->id;
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql = "INSERT INTO hoteles (id, hotel, direccion, telefono, email) VALUES (?, ?, ?, ?, ?)";

    $setencia = Flight::db()->prepare($sql);

    $setencia->bindParam(1, $id);
    $setencia->bindParam(2, $hotel);
    $setencia->bindParam(3, $direccion);
    $setencia->bindParam(4, $telefono);
    $setencia->bindParam(5, $email);

    $setencia->execute();
    Flight::jsonp(["Hotel agregado correctamente"]);
});



Flight::start();

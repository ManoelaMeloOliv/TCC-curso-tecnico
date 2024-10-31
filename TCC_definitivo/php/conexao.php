<?php

$host = 'localhost';
$user = 'root';
$password = '1234';
$database = 'formulario_etec';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Erro de conexão: ' . $mysqli->connect_error);
}

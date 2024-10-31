<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '1234';
$dbName = 'formulario_tcc';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
//
//if($conexao -> connect_errno) {
  //  echo"Erro";
//} else {
    //echo "Conectado com sucesso";
//}

?>
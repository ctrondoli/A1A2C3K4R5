<?php

$usuario = 'egolpe';
$senha = 'u-903Oz27.e5#';
$database = 'egolpe';
$host = 'egolpe.mysql.dbaas.com.br';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>
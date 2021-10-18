<?php 

$usuario = 'root';
$senha = '';
$database = 'comparapreços';
$host= 'localhost';

$mysqli = new mysqli($host,$usuario,$senha,$database);

if($mysqli->error){
      die("Erro ao se conectar no banco de dados" . $mysqli->error);
}
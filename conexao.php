<?php

$host = "localhost";
$banco = "sistema";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($host, $usuario, $senha, $banco);

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados.");
}

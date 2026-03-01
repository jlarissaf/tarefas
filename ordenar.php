<?php
require_once "conexao.php";

$ids = json_decode(file_get_contents("php://input"), true);

$ordem = 1;

foreach ($ids as $id) {
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem 
        WHERE id = $id
    ");
    $ordem++;
}

<?php
require_once "conexao.php";

$id = $_GET['id'];

//buscar tarefa atual
$sql = "SELECT ordem_apresentacao FROM tarefas WHERE id = $id";
$res = $mysqli->query($sql);
$tarefa = $res->fetch_assoc();

$ordem_atual = $tarefa['ordem_apresentacao'];

if ($ordem_atual > 1) {

    $ordem_acima = $ordem_atual - 1;

    //tarefa de cima vai para 0 (temporario)
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = 0 
        WHERE ordem_apresentacao = $ordem_acima
    ");

    //tarefa atual sobe
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem_acima 
        WHERE id = $id
    ");

    //tarefa que estava em cima desce
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem_atual 
        WHERE ordem_apresentacao = 0
    ");
}

header("Location: inicial.php");
exit;

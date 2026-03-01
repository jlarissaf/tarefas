<?php
require_once "conexao.php";

$id = $_GET['id'];

//buscar tarefa
$sql = "SELECT ordem_apresentacao FROM tarefas WHERE id = $id";
$res = $mysqli->query($sql);
$tarefa = $res->fetch_assoc();

$ordem_atual = $tarefa['ordem_apresentacao'];

$res = $mysqli->query("SELECT MAX(ordem_apresentacao) AS max FROM tarefas");
$linha = $res->fetch_assoc();
$max = $linha['max'];

if ($ordem_atual < $max) {

    $ordem_abaixo = $ordem_atual + 1;

    // tarefa de baixo vai pra 0
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = 0 
        WHERE ordem_apresentacao = $ordem_abaixo
    ");

    //tarefa atual desce
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem_abaixo 
        WHERE id = $id
    ");

    //tarefa q estava abaixo sobe
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem_atual 
        WHERE ordem_apresentacao = 0
    ");
}

header("Location: inicial.php");
exit;

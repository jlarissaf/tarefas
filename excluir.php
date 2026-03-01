<?php
require_once "conexao.php";

if (!isset($_GET['id'])) {
    echo "Tarefa não encontrada.";
    exit;
}

$id = $_GET['id'];

//excluir
$mysqli->query("DELETE FROM tarefas WHERE id = $id");

//reordenar
$sql = "SELECT id FROM tarefas ORDER BY ordem_apresentacao";
$resultado = $mysqli->query($sql);

$ordem = 1;

while ($linha = $resultado->fetch_assoc()) {
    $id_atual = $linha['id'];
    $mysqli->query("
        UPDATE tarefas 
        SET ordem_apresentacao = $ordem 
        WHERE id = $id_atual
    ");
    $ordem++;
}

header("Location: inicial.php");
exit;


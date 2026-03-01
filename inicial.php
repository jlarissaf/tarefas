<?php
require_once "conexao.php";

$sql_select = "SELECT * FROM tarefas ORDER BY ordem_apresentacao";
$sql_query = $mysqli->query($sql_select) or die($mysqli->error);
?>

<style>
.destaque {
    background-color: #caeaa6;
}
</style>

<h1>Tarefas</h1>

<table border="1">
    <thead>
        <tr>
<<<<<<< HEAD
            <td>ID</td>
=======
>>>>>>> e70c7a20778fc573c88092fe3caf910ceaf99da1
            <td>Ordem</td>
            <td>Nome</td>
            <td>Custo</td>
            <td>Data limite</td>
            <td>Ação</td>
        </tr>
    </thead>

    <tbody id="lista-tarefas">
        <?php while ($linha = $sql_query->fetch_assoc()): ?>
        <tr draggable="true" data-id="<?= $linha['id'] ?>"
            class="<?= ($linha['custo'] > 1000) ? 'destaque' : '' ?>">

<<<<<<< HEAD
            <td><?= $linha['id'] ?></td>
=======
>>>>>>> e70c7a20778fc573c88092fe3caf910ceaf99da1
            <td><?= $linha['ordem_apresentacao'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td>R$ <?= number_format($linha['custo'], 2, ',', '.') ?></td>
            <td><?= date("d/m/Y", strtotime($linha['datalimite'])) ?></td>
            <td>
                <a href="subir.php?id=<?= $linha['id'] ?>">🔼</a>
                <a href="descer.php?id=<?= $linha['id'] ?>">🔽</a>
                <a href="editar.php?id=<?= $linha['id'] ?>">Editar</a>
<<<<<<< HEAD
                <a href="excluir.php?id=<?= $linha['id'] ?>"
                onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')"> Excluir
               </a>
=======
                <a href="excluir.php?id=<?= $linha['id'] ?>">Excluir</a>
>>>>>>> e70c7a20778fc573c88092fe3caf910ceaf99da1
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<br>

<a href="incluir.php">Nova tarefa</a>

<script>
let linhaArrastada = null;

document.querySelectorAll("#lista-tarefas tr").forEach(linha => {

    linha.addEventListener("dragstart", () => {
        linhaArrastada = linha;
        linha.style.opacity = "0.5";
    });

    linha.addEventListener("dragend", () => {
        linha.style.opacity = "1";
    });

    linha.addEventListener("dragover", e => {
        e.preventDefault();
    });

    linha.addEventListener("drop", () => {
        if (linhaArrastada !== linha) {
            linha.parentNode.insertBefore(linhaArrastada, linha);
            atualizarOrdem();
        }
    });
});

function atualizarOrdem() {
    let ids = [];

    document.querySelectorAll("#lista-tarefas tr").forEach(tr => {
        ids.push(tr.dataset.id);
    });

    fetch("ordenar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(ids)
    });
}
</script>

<?php
require_once "conexao.php";

if (!isset($_SESSION)) {
    session_start();
}

$erro = [];

if (!isset($_GET['id'])) {
    echo "Tarefa não encontrada.";
    exit;
}

$id = $_GET['id'];

$sql_busca = "SELECT * FROM tarefas WHERE id = $id";
$resultado = $mysqli->query($sql_busca);
$tarefa = $resultado->fetch_assoc();

if (!$tarefa) {
    echo "Tarefa não encontrada.";
    exit;
}



if (isset($_POST['confirmar'])) {

    // guardar dados na sessão
    foreach ($_POST as $chave => $valor) {
        $_SESSION[$chave] = $valor;
    }

    // validaçoes
    if (strlen($_SESSION['nome']) == 0)
        $erro[] = "Digite o nome da tarefa";

    if (strlen($_SESSION['custo']) == 0)
        $erro[] = "Digite o custo";

    if (strlen($_SESSION['data']) == 0)
        $erro[] = "Digite a data limite";

    // verficar nomes duplicadoss
    $nome = $_SESSION['nome'];
    $sql_nome = "SELECT id FROM tarefas WHERE nome = '$nome'";
    $consulta = $mysqli->query($sql_nome);

    if ($consulta->num_rows > 0) {
        $erro[] = "Já existe uma tarefa com esse nome";
    }

    // inserçao no banco
    if (count($erro) == 0) {

        $nome  = $_SESSION['nome'];
        $custo = $_SESSION['custo'];
        $data  = $_SESSION['data'];

        $sql_update = "
            UPDATE tarefas SET
                nome = '$nome',
                custo = '$custo',
                datalimite = '$data'
            WHERE id = $id
        ";

        if ($mysqli->query($sql_update)) {
            // Limpar sessão
            unset($_SESSION['nome'], $_SESSION['custo'], $_SESSION['data']);
            header("Location: inicial.php");
            exit;
        } else {
            $erro[] = "Erro ao editar.";
        }
    } 
} 
?>

<h1>Editar Tarefa</h1>

<?php
if (count($erro) > 0) {
    echo "<div>";
    foreach ($erro as $msg) {
        echo "$msg <br>";
    }
    echo "</div>";
}
?>

<form method="POST">

    <label>Nome da tarefa</label><br>
    <input name="nome" type="text" required
           value="<?= isset($_SESSION['nome']) ? $_SESSION['nome'] : '' ?>">
    <br><br>

    <label>Custo (R$)</label><br>
    <input name="custo" type="number" step="0.01" min="0" required
           value="<?= isset($_SESSION['custo']) ? $_SESSION['custo'] : '' ?>">
    <br><br>

    <label>Data limite</label><br>
    <input name="data" type="date" required
           value="<?= isset($_SESSION['data']) ? $_SESSION['data'] : '' ?>">
    <br><br>

    <input type="submit" name="confirmar" value="Salvar">

</form>

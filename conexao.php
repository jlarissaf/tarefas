<?php

<<<<<<< HEAD
=======
$host = "localhost";
$banco = "sistema";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($host, $usuario, $senha, $banco);

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados.");
}


///para hospedagem
<?php

>>>>>>> e70c7a20778fc573c88092fe3caf910ceaf99da1
$mysqli = new mysqli(
    "sql300.infinityfree.com",
    "if0_41027526",
    "querocomer24",
    "if0_41027526_root",
    3306
);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");
<<<<<<< HEAD
=======

>>>>>>> e70c7a20778fc573c88092fe3caf910ceaf99da1

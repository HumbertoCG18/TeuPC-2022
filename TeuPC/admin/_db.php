<?php

// informações sobre o servidor de banco de dados
$db_host = 'localhost';
$db_usuario = 'root';
$db_senha = '';
$db_base = 'teupc';

// conexao com o servidor de banco de dados
$conn = mysqli_connect($db_host, $db_usuario, $db_senha, $db_base);

// Verifica se houve erro no banco de dados
if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}


?>
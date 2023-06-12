<?php
    // Configuração de conexão com o banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "museu_nacional";

    // Conecta ao banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $dbname);
    if ($conexao->connect_errno) {
        echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
       
    }
?>

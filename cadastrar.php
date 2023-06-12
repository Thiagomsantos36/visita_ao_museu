<?php
	if(isset($_POST['submit'])){		
    	// Inclui o arquivo de conexão com o banco de dados
   	 	include_once('conexao.php');

    	// Verifica se o formulário foi submetido
        // Obtém os valores do formulário
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];        
        $email = $_POST["email"];        
        $data_cadastro = $_POST["data_cadastro"];

        // Prepara a instrução SQL de inserção com declarações preparadas
        $stmt = mysqli_prepare($conexao, "INSERT INTO usuarios (nome, senha, email, data_cadastro)
                VALUES (?, ?, ?, ?)");

        // Vincula os parâmetros
        mysqli_stmt_bind_param($stmt, 'ssss', $nome, $senha, $email,  $data_cadastro);

        // Executa a instrução preparada
        mysqli_stmt_execute($stmt);

        // Verifica se a inserção foi bem sucedida
        $rows = mysqli_stmt_affected_rows($stmt);
        if ($rows > 0) {
			 // Redireciona o visitante para a página principal
        } else {
            echo "Erro ao inserir dados!";
        }

        // Fecha a instrução preparada
        mysqli_stmt_close($stmt);

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilo.css">
  <title>Cadastro de Usuário</title>

</head>
<body>
<header><!-- Início header -->
        <div id="logo">
            <h1><a href="index.php">Museu Nacional</a></h1>
        </div>
        <nav><!-- Início nav -->
            <ul>    
                <li><a href="">Área de acesso a funcionários:</a></li>
            </ul>
        </nav><!--/fim nav -->
    </header><!--/fim header -->
    

</body>
</html>

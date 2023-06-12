<?php
include_once('conexao.php');
include_once('funcoes.php');

if(isset($_POST['login'])){      
    // Inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // Obtém os valores do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $data_cadastro = $_POST["data_cadastro"];

    // Verifica a senha no banco de dados
    $query = "SELECT senha FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conexao, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $senhaArmazenada = $row['senha'];

        // Verifica se a senha fornecida corresponde à senha armazenada
        if (password_verify($senha, $senhaArmazenada)) {
            // Senha correta, redireciona o usuário para a página desejada
            session_start();
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            // Senha incorreta, exibe uma mensagem de erro
            echo "Senha incorreta!";
        }
    } else {
        // Usuário não encontrado, exibe uma mensagem de erro
        echo "Usuário não encontrado!";
    }

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

    <!-- Title -->
    <title>Usuarios</title>
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
    <br>
    <br>
    <br>
    <br>

    <form action="admim.php" method="post">
        <fieldset>
            <legend>Acesso aos Registros de Visitantes</legend>
            
            <input type="text" name="nome" placeholder="Informe seu nome" id="nome" required>
            <input type="email" name="email" placeholder="Informe seu E-mail" id="email" required>
            <input type="password" name="senha" placeholder="Informe sua senha" id="senha" required>
            
            <button type="submit" name="submit"  onclick="submitForm(); return false;">Acessar</button>
            
        </fieldset>
    </form>
    <hr><br><hr><br><hr>

    <h1>Cadastrar Usúarios</h1>

    <form action="login.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <input type="datetime-local" name="datetime-local">

        <button type="submit" name="submit">Cadastrar</button>
    </form>

    
    <span id="meu-hash"></span>

    <script>
        function calcularSHA1(dados) {
            var hash = CryptoJS.SHA1(dados);
            return hash.toString();
        }

        function submitForm() {
            var meuTexto = "Este é o meu texto para verificar.";
            var meuHash = calcularSHA1(meuTexto);
            document.getElementById("meu-hash").innerHTML = meuHash;
            document.forms[0].submit();
        }
    </script>

</body>
</html>

<?php
    // Inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // Verifica se o parâmetro "id" foi passado na URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Verifica se o formulário foi submetido
        if(isset($_POST['submit'])) {
            // Obtém os valores do formulário
            $nome = $_POST["nome"];
            $data_nascimento = $_POST["data_nascimento"];
            $email = $_POST["email"];
            $estado = $_POST["estado"];
            $qtd_pessoas = $_POST["qtd_pessoas"];

            // Atualiza os dados no banco de dados
            $sql = "UPDATE visitantes SET nome=?, data_nascimento=?, email=?, estado=?, qtd_pessoas=? WHERE id=?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $data_nascimento, $email, $estado, $qtd_pessoas, $id);
            mysqli_stmt_execute($stmt);

            // Verifica se a atualização foi bem sucedida
            $rows = mysqli_stmt_affected_rows($stmt);
            if ($rows > 0) {
                echo "Registro atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o registro!";
            }

            // Fecha a instrução preparada
            mysqli_stmt_close($stmt);
        }

        // Obtém os dados do registro para exibir no formulário de edição
        $sql = "SELECT * FROM visitantes WHERE id=?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $registro = mysqli_fetch_assoc($result);

        // Fecha a instrução preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "ID do registro não encontrado!";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
    <style>
    h1 {
        color: white;
    }

    form {
        margin: 20px;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 300px;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    input[type="submit"] {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>
    <h1>Editar Registro</h1>

    <form method="post" action="">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $registro['nome']; ?>"><br>

        <label>Data de Nascimento:</label>
        <input type="text" name="data_nascimento" value="<?php echo $registro['data_nascimento']; ?>"><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $registro['email']; ?>"><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $registro['estado']; ?>"><br>

        <label>Quantidade de Pessoas:</label>
        <input type="text" name="qtd_pessoas" value="<?php echo $registro['qtd_pessoas']; ?>"><br>

        <input type="submit" name="submit" value="Atualizar">
    </form>


    
</body>
</html>

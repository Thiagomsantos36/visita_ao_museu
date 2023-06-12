<?php
    // Inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // Verifica se o parâmetro "id" foi passado na URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Exclui o registro do banco de dados
        $sql = "DELETE FROM visitantes WHERE id=?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        // Verifica se a exclusão foi bem sucedida
        $rows = mysqli_stmt_affected_rows($stmt);
        if ($rows > 0) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Erro ao excluir o registro!";
        }

        // Fecha a instrução preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "ID do registro não encontrado!";
    }
?>

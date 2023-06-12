<?php
   /**
    * Summary of login
    * @param mixed $conexao
    * @return void
    */
   function login($conexao){

    if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $senha = sha1($_POST['senha']);
        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $executar = mysqli_query($conexao, $query);
        $return = mysqli_fetch_assoc($executar);

        if (!empty($return['email'])) {
            echo "Bem Vindo! " . $return['nome'];
            session_start();

            $_SESSION['nome'] = $return['nome'];
            $_SESSION['id'] = $return['id'];
            $_SESSION['ativa'] = TRUE;
            header("Location: login.php");
            exit();
        } else {
            echo "Usuário ou senha não encontrado!";
        }
    }
}
?>


<?php
    include_once('conexao.php');
    
    function exibirRegistros() {
        global $conexao;
        $sql = "SELECT * FROM visitantes";
        $result = mysqli_query($conexao, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['data_nascimento']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['estado']."</td>";
                echo "<td>".$row['qtd_pessoas']."</td>";
                echo "<td><a href='editar.php?id=".$row['id']."'>Editar</a></td>";
                echo "<td><a href='excluir.php?id=".$row['id']."'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
        }
    }

    function exibirRegistrosdosfuncionarios() {
        global $conexao;
        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($conexao, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['senha']."</td>";
                echo "<td>".$row['email']."</td>";
                
                echo "<td>".$row['data_cadastro']."</td>";
                echo "<td><a href='editar.php?id=".$row['id']."'>Editar</a></td>";
                echo "<td><a href='excluir.php?id=".$row['id']."'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
        }
    }
?>

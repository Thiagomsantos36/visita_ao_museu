<?php
    // Inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php'); 
    
    include_once('exibirRegistros.php');

    // Restante do seu código...
?>

   

<!DOCTYPE html>
<html>
<head>
    <title>Administração</title>
     <!-- Estilo customizado -->
     <link rel="stylesheet" href="css/estilo.css">

     <style>
        h1 {
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
      <header><!-- Início header -->
            <div id="logo">
                <h1><a href="index.php">Museu Nacional</a></h1>
            </div>           

        </header><!--/fim header -->


    <h1>Àrea Administrativa</h1>

    <h2>Registro de Visitantes</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Quantidade de Pessoas</th>            
        </tr>
        
        <?php exibirRegistros(); ?>
      
    </table>
    <h2>Registros dos funcionarios</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>senha</th>
        <th>Email</th>
       
        <th>data_cadastro</th>            
    </tr>
    
    
    <?php exibirRegistrosdosfuncionarios(); ?>
</table>
    
</body>
</html>



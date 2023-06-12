<?php
	if(isset($_POST['submit'])){		
    	// Inclui o arquivo de conexão com o banco de dados
   	 	include_once('conexao.php');

    	// Verifica se o formulário foi submetido
        // Obtém os valores do formulário
        $nome = $_POST["nome"];
        $data_nascimento = $_POST["data_nascimento"];
        $email = $_POST["email"];
        $estado = $_POST["estado"];
        $qtd_pessoas = $_POST["qtd_pessoas"];

        // Prepara a instrução SQL de inserção com declarações preparadas
        $stmt = mysqli_prepare($conexao, "INSERT INTO visitantes (nome, data_nascimento, email, estado, qtd_pessoas)
                VALUES (?, ?, ?, ?, ?)");

        // Vincula os parâmetros
        mysqli_stmt_bind_param($stmt, 'sssss', $nome, $data_nascimento, $email, $estado, $qtd_pessoas);

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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	
	<!-- Estilo customizado -->
	<link rel="stylesheet"  href="css/estilo.css">

	<title>Museu Nacional</title> 
	

</head>
<body>
	
	<?php 
		if(isset($_POST['submit'])){
	?>
		<div class="caixa-flutuante">
			<div class="sucesso"><?php echo "Visitante cadastrado com sucesso! Aguardamos a sua Visita!!!"; ?></div>
		</div>	
	<?php 
		}
	?>
	<div id="container"><!-- Início container -->
		
		<header><!-- Início header -->
			<div id="logo">
				<h1><a href="index.php">Museu Nacional</a></h1>
			</div>
			<nav><!-- Início nav -->
				<ul>								
					<li><a href="Exposicoes.php">Exposições</a></li>
			        <li><a href="Acervo.php">Acervo</a></li>
			        <li><a href="Videos.php">vídeos</a></li> 
			        <li><a href="Visitacao.php">Visitação</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav><!--/fim nav -->

		</header><!--/fim header -->

		<div id="principal"><!-- Início principal -->
			
			<div id="conteudo"><!-- Início conteudo -->

				<section id="capa">
					<img src="img/museu.png" alt="foto do museu do alto ">
				</section>

				<section id="postagens">

					<article id="video">
						
						<h3>Vídeo: conheça o museu</h3>
						<iframe width="310" height="370" src="https://www.youtube.com/embed/RGUYb-hivrc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

					</article>

					<article id="mapa">
						<h3>Mapa: Encontre o museu</h3>
						<iframe width="310" height="370"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.206311665319!2d-43.228717585034445!3d-22.90575998501238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e58a085b7af%3A0x4d11e9a933d38ce3!2sMuseu+Nacional+-+UFRJ!5e0!3m2!1spt-BR!2sbr!4v1537538326477" frameborder="0" style="border:0" allowfullscreen></iframe>
					</article>

				

					<article id="exposicoes">
						<h3>Exposições</h3>
						<ul>
							<li>
	                        	<p>Os assustadores insetos</p>
	                        </li>
	                        <li>
	                        	<p>O crânio de Luzia, a mulher mais antiga do Brasil</p>
	                        </li>
	                        <li>
	                        	<p>Preguiça gigante e tigre-dentes-de-sabre</p>
	                        </li>
	                        <li>
	                        	<p>Plantas do Brasil Central</p>
	                        </li>
	                        <li>
	                        	<p>Teresa Cristina: A Imperatriz Arqueóloga</p>
	                        </li>
	                        <li>
	                        	<p>Arte Com Dinossauros - Paleoarte</p>
	                        </li>
	                        <li>
								<a href="#"><strong>Veja todos (65)</strong></a>
							</li>
							
						</ul>
					</article>

					<article id="historia">
						<h3>200 anos de história</h3>
						<p>
	                    	Numa ponta que avançava sobre o mar, posteriormente conhecida como Ponta do Calabouço, entre as praias de Piaçaba e Santa Luzia, no centro histórico do Rio de Janeiro, os portugueses construíram em 1603 a Fortaleza de Santiago, origem do conjunto arquitetônico que hoje abriga o Museu Histórico Nacional.
	                    </p>

	                    <a href=""><strong>Leia mais</strong></a>

					</article>
					
				</section>

			</div><!--/fim conteudo -->

			<aside><!-- Início aside -->
				<section id="depoimento">
					<img src="img/depoimento.png" alt="foto do depoimento ">
				</section>

				<section id="visita"><!-- Início seção visita -->
					<h4>Faça uma visita</h4>

					<form action="index.php" method="POST">

						<label for="nome">Nome:</label>
						<input type="text" id="nome" name="nome" required>
						<br>
						<label for="data_nascimento">Data de nascimento:</label>
						<input type="date" id="data_nascimento" name="data_nascimento">
						<br>
						<label for="email">E-mail:</label>
						<input type="email" id="email" name="email">
						<br>
						<label for="estado">Estado:</label>
							<select name="estado" id="estado" required>
								<option value="">Selecione</option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						<br>
						<label for="qtd">Quantidade de pessoas:</label>
						<input type="number" id="qtd_pessoas" name="qtd_pessoas" min="1" value="1" placeholder="text">
						<br>
						

						<div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
					               Concorde com os termos e condições para continuar:
                                </label>
                              <div class="invalid-feedback">	              
                             </div>
                            </div>
                        </div>

						 <button type="submit" name="submit" >Cadastrar</button>

						

					  </form>
					 				  
					  
				</section><!--/fim seção visita -->
				

				<section id="galeria">
					<h4>Galeria de fotos</h4>
					
					<a>
						<img src="img/imagem1.jpg" height="93" width="93" alt="img galeria">
					</a>

					<a>
						<img src="img/imagem2.jpg" height="93" width="93" alt="img galeria">
					</a>

					<a>
						<img src="img/imagem3.jpg" height="93" width="93" alt="img galeria">
					</a>

					<a>
						<img src="img/imagem4.jpg" height="93" width="93" alt="img galeria">
					</a>

				</section>

			</aside><!--/fim aside -->

			<footer>				
				<p>
					2023 <a href="index.php">Museu Nacional</a> - Todos os direitos reservados.
					<h5>por' T.M.S '</h5>
				</p>
			</footer>

		</div><!--/fim principal -->

	</div><!--/fim container -->

	<div id="relogio"></div>
	<script src="js/jquery.js"></script>
	<script>
    function atualizarRelogio() {
        var dataAtual = new Date();
        var hora = dataAtual.getHours();
        var minutos = dataAtual.getMinutes();
        var segundos = dataAtual.getSeconds();

        // Formata os valores para sempre terem 2 dígitos
        hora = hora < 10 ? "0" + hora : hora;
        minutos = minutos < 10 ? "0" + minutos : minutos;
        segundos = segundos < 10 ? "0" + segundos : segundos;

        // Atualiza o conteúdo da div com a hora atual
        document.getElementById("relogio").innerHTML = hora + ":" + minutos + ":" + segundos;

        // Chama a função novamente a cada segundo para atualizar o relógio
        setTimeout(atualizarRelogio, 1000);
    }

    // Chama a função pela primeira vez para iniciar o relógio
    atualizarRelogio();
</script>

	
</body>
<script src="script.js"></script>
</html>
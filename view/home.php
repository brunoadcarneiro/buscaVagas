<?php
require "../phpfunc/validaLogin.php";
?>

<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='theme-color' content="#268829">
	<title>Portal de Vagas Grau Técnico</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
</head>

<body>
	<div class="organiza">
		<header class="menu-principal">
			<?php include '../includes/cabecalho.php' ?>
		</header>
		<main class="mainP">
			<div class="conteudo">
				<div class="txtbox">
					<br>
					<p>
					<h1 align="center">Bem vindos</h2>
						<h3 align="center">Kairós - Sistema de Busca de Oportunidades</h3><br>
						Este é um sistemas de busca de oportunidades de estágio ou emprego dentro de um portal, ele tem como principal foco ajudar o candidato
						 a encontrar a oportunidade que mais lhe atenda.<br>
						Sendo assim ele conta com um sistema de cadastro de vagas personalizado onde a instituição pode postar todas as vagas ou permitir que empresas cadastradas tenham acesso ao sistema e possam assim postar as vagas, essas apareceram na lista de oportunidades apenas se o adminstrador da ferramenta tornar ela ativa.<br><br>
						O Sistema surgiu a partir de uma demanda proposta pelo Professor, onde a ideia era criar o layout de um sistema de busca de vagas, assim que concluimos a parte de layout ele nos propos criar realmente o sistema, com todas as suas funcionalidades, aceitamos o desafio e entregamos um sistema de cadastro e busca de vagas com todas as funcionalidades que foram propostas.
						</p><br>
				</div>
				<hr>
				<div class="txtbox">
					<div class="row">
						<div class="col-sm">
							<h3 align="center">Missão</h3><br>
							Projetar e desevolver softwares com qualidade e segurança, para todos os nossos clientes, visando assim a maxima satisfação deles.
							<br>
						</div>
						<div class="col-sm">
							<h3 align="center">Visão</h3><br>
							Ser reconhecida nacionalmente pela qualidade nos projetos desenvolvidos.
							<br>
						</div>
						<div class="col-sm">
							<h3 align="center">Valor</h3><br>
							Integridade, Comprometimento, Valorização humana, Superação dos resultados, Melhoria contínua, Inovação, são valores importates para nossa empresa.
							</p><br>
						</div>
					</div>
				</div>
		</main>
		<footer>
			<?php include '../includes/rodape.php' ?>
		</footer>
	</div>
</body>

</html>
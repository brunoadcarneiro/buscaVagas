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
	<script type="text/javascript">
		$(document).ready(function() {

			$("#telefone").mask("(00) 0000-0000")
			$("#salario").mask("#.##0,00", {
				reverse: true
			})
			$("#celular").mask("(00) 0000-00009")
			$("#celular").blur(function(event) {
				if ($(this).val().length == 15) {
					$("#celular").mask("(00) 00000-0009")
				} else {
					$("#celular").mask("(00) 0000-00009")
				}
			})
		})
	</script>
</head>

<body>
	<div class="organiza">
		<header class="menu-principal">
			<?php include '../includes/cabecalho.php' ?>
		</header>
		<main class="mainP">
			<div class="conteudo">
				<div class="registroformulario">
					<h1> Contato </h1>
				</div>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				<form class="formulario" id="formCadastro" name="formCadastro" method="POST" action="../phpfunc/recebeContato.php">
					<div className="comp">
						
						<label class="titulo">Nome:</label><br />
						<input class="txtentra" type="text" name="nome" placeholder="Digite o seu nome" id="bn" size="85" maxLength="200" required /><br /><br />
						

						
						<label class="titulo">E-mail:</label><br />
						<input class="txtentra" type="text" name="email" placeholder="Digite o E-mail" size="85" maxLength="200" required /><br /><br />
						

						
						<label class="titulo">Unidade:</label><br>
						<select class="selentra" name="unidade">
							<option disabled="disabled" selected="selected" value=""></option>
							<option value="GTC">GTC - BH</option>
							<option value="POLO">Polo - BH</option>
						</select><br /><br />
						


						<label class="titulo">Motivo do Contato:</label><br>
						<textarea class="txtarea" name="motivo" cols="40" rolls="15"></textarea><br /><br />
						

						
						<div class="botaoDiv">
							<button id="btnEnviar" class="btn btn-success view_data" type="submit">Enviar</button>&nbsp;&nbsp;&nbsp;
							<button id="btnEnviar" class="btn btn-danger view_data" type="reset">Cancelar</button>
						</div>
						<br>
						
					</div>
				</form>
			</div>
		</main>
		<footer>
			<?php include '../includes/rodape.php' ?>
		</footer>
	</div>
</body>

</html>
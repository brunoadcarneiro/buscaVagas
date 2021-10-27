<?php
require "../phpfunc/validaLogin.php";
$perm = 'adm';
if (isset($_SESSION["permissao"])) {
	if ($_SESSION["permissao"] != $perm) {
		// Definindo uma seção
		$_SESSION['erro_perm'] = true;
		// Definindo o cabeçalho
		header('Location: ../view/page_403.php');
		// Pára o carregamento da página
		exit;
	}
}

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
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
					<h1> Cadastro de Usuário </h1>
				</div>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				<form class="formulario" id="formCadastro" name="formCadastro" method="POST" action="../phpfunc/recebeUser.php">
					<div className="comp">

						<div class="dividiinput">
							<div class="input1">
								<!-- Nome do Usuário -->
								<label class="titulo">Nome:*</label><br />
								<input class="txtentra" type="text" name="nome_user" placeholder="Digite o nome do Usuario" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
							<div class="input2">
								<!-- digitar e-mail-->
								<label class="titulo">E-mail:*</label><br />
								<input class="txtentra" type="text" name="email_user" placeholder="Digite o E-mail" size="85" maxLength="200" required /><br /><br />
							</div>
						</div>
						<!-- fim -->

						<!-- digitar telefone -->
						<div class="dividiinput">
							<div class="input1">
								<label class="titulo">Telefone:</label><br>
								<input id="telefone" class="tel" type="text" name="telefone_user" size="85" maxLength="200" placeholder="Digito o numero do celular"><br /><br />
							</div>
							<div class="input2">
								<label class="titulo">Celular:*</label><br>
								<input id="celular" class="cel" type="text" name="celular_user" size="85" maxLength="200" required placeholder="Digito o numero do celular" required><br /><br />
							</div>
						</div>
						<!-- fim -->
						<div class="dividiinput">
							<div class="input1">
								<!-- Cargo do Usuário -->
								<label class="titulo">Status:*</label><br />
								<select class="selentra" name="status_user">
									<option disabled="disabled" selected="selected" value="" required></option>
									<option value="A">Ativo</option>
									<option value="I">Inativo</option>
								</select><br /><br />
								<!-- fim -->
							</div>
							<div class="input2">
								<!-- Data de Nascimento -->
								<label class="titulo">Data de Nascimento:*</label><br />
								<input class="txtentra" type="date" name="dtn_user" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
							<div class="input3">
								<!-- seleção de Permissão -->
								<label class="titulo">Permissão do Usuário:*</label><br />
								<select class="selentra" name="perm_user" required>
									<option disabled="disabled" selected="selected" value=""></option>
									<option value="adm">Administrador</option>
									<option value="alu">Aluno</option>
									<option value="emp">Empresa</option>
								</select><br /><br />
								<!-- fim -->
							</div>
						</div>
						<div class="dividiinput">
							<div class="input1">
								<!-- Login do Usuário -->
								<label class="titulo">CPF:*</label><br />
								<input class="txtentra" type="text" name="cpf_user" placeholder="Digite o CPF do Usuário" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
							<div class="input2">
								<!-- Login do Usuário -->
								<label class="titulo">Login:*</label><br />
								<input class="txtentra" type="text" name="login_user" placeholder="Digite o Login" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
							<div class="input3">
								<!-- Senha do Usuário -->
								<label class="titulo">Senha:*</label><br />
								<input class="txtentra" type="password" name="senha_user" placeholder="*********" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
						</div>

						<!-- Botões do Form -->
						<div class="botaoDiv">
							<button id="btnEnviar" class="btn btn-success" type="submit">Enviar</button>&nbsp;&nbsp;&nbsp;
							<button id="btnEnviar" class="btn btn-danger" type="reset">Cancelar</button>
						</div>
						<br>
						<!-- fim -->

					</div>
				</form>
				<!-- <iframe src="../modal/modalUser.php"></iframe> -->
				<div class="container">

		<span id="conteudo"></span><br><br><br>
	</div>

	<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes da Vaga</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="visul_usuario"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		var qnt_result_pg = 40; //quantidade de registro por página
		var pagina = 1; //página inicial
		$(document).ready(function() {
			listarUser(pagina, qnt_result_pg); //Chamar a função para listar os registros
		});

		function listarUser(pagina, qnt_result_pg) {
			var dados = {
				pagina: pagina,
				qnt_result_pg: qnt_result_pg
			}
			$.post('../phpfunc/listarUser.php', dados, function(retorna) {
				//Subtitui o valor no seletor id="conteudo"
				$("#conteudo").html(retorna);
			});
		}

		$(document).ready(function() {
			$(document).on('click', '.view_data', function() {
				var user_id = $(this).attr("id");
				//alert(user_id);
				//Verificar se há valor na variável "user_id".
				if (user_id !== '') {
					var dados = {
						user_id: user_id
					};
					$.post('../phpfunc/visualizarUser.php', dados, function(retorna) {
						//Carregar o conteúdo para o usuário
						$("#visul_usuario").html(retorna);
						$('#visulUsuarioModal').modal('show');
					});
				}
			});
		});
	</script>
			</div>
		</main>
		<footer>
			<?php include '../includes/rodape.php' ?>
		</footer>
	</div>
</body>

</html>
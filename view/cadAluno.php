<?php
require "../phpfunc/validaLogin.php";
// Validando se o usuário tem permissão de acesso
$perm = 'adm';
if (isset($_SESSION["permissao"])) {
	if ($_SESSION["permissao"] != $perm) {
		// Definindo a seção erro_perm com true para bloquear usuarios sem permissão
		$_SESSION['erro_perm'] = true;
		// Definindo o redirecionamento
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
			$('#cpf').mask('000.000.000-00', {
				reverse: true
			});
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
					<h1> Cadastro de Aluno </h1>
				</div>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				<form class="formulario" id="formCadastro" name="formCadastro" method="POST" action="../phpfunc/recebeAluno.php">
					<div className="comp">

						<div class="dividiinput">
							<div class="input1">
								<!-- Nome do Usuário -->
								<label class="titulo">Nome:*</label><br />
								<input class="txtentra" type="text" name="nome_aluno" placeholder="Digite o nome do Aluno" id="bn" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->
							</div>
							<div class="input2">
								<!-- digitar e-mail-->
								<label class="titulo">E-mail:*</label><br />
								<input class="txtentra" type="text" name="email_aluno" placeholder="Digite o E-mail" size="85" maxLength="200" required /><br /><br />
							</div>
						</div>
						<!-- fim -->

						<!-- digitar telefone -->
						<div class="dividiinput">
							<div class="input1">
								<label class="titulo">Telefone:</label><br>
								<input id="telefone" class="tel" type="text" name="telefone_aluno" size="85" maxLength="200" placeholder="Digito o numero do celular"><br /><br />
							</div>
							<div class="input2">
								<label class="titulo">Celular:*</label><br>
								<input id="celular" class="cel" type="text" name="celular_aluno" size="85" maxLength="200" required placeholder="Digito o numero do celular" required><br /><br />
							</div>
						</div>
						<!-- fim -->
						<div class="dividiinput">
							<div class="input1">
								<!-- seleção da unidade -->
								<label class="titulo">Unidade:*</label><br>
								<select class="selentra" name="unidade_aluno" required>
									<option disabled="disabled" selected="selected" value=""></option>
									<option value="GTC">GTC - BH</option>
									<option value="POLO">Polo - BH</option>
								</select><br /><br />
								<!-- fim -->
							</div>
							<div class="input2">
								<!-- seleção do curso -->
								<label class="titulo">Curso:</label><br />
								<select class="selentra" name="curso_aluno">
									<option selected disabled value=""></option>
									<optgroup label="Tecnologia">
										<option value="Tec. Informática">Informática(T.I)</option>
										<option value="Tec. Redes de Computador">Redes de Computadores</option>
										<option value="Tec. Manutenção de computadores">Manutenção</option>
										<option value="Tec. Desenvolvimento Web">Informática Web</option>
									</optgroup>
									<optgroup label="Saúde">
										<option value="Tec. Enfermagem">Enfermagem</option>
										<option value="Tec. Radiologia">Radilogia</option>
										<option value="Tec. Análise Clinica">Análise-Clinícas</option>
										<option value="Tec. Farmácia">Farmácia</option>
										<option value="Tec. Nutrição">Nutrição</option>
										<option value="Tec. Estética">Estética</option>
										<option value="Tec. Saúde Bocal">Saúde Bucal</option>
									</optgroup>
									<optgroup label="Negócios">
										<option value="Tec. Administração">Administração</option>
										<option value="Tec. Recursos Humanos">Recursos Humanos</option>
										<option value="Tec. Logística">Logística</option>
										<option value="Tec. Contabilidade">Contabilidade</option>
										<option value="Tec. Transações Imobiliárias">Transações Imobiliárias</option>
										<option value="Tec. Serviços Juridicos">Serviços Jurídicos</option>
									</optgroup>
									<optgroup label="Indústria">
										<option value="Tec. Edificações">Edificações</option>
										<option value="Tec. Meio Ambiente">Meio Ambiente</option>
										<option value="Tec. Mecânica">Mecânica</option>
										<option value="Tec. Segurança do Trabalho">Segurança do Trabalho</option>
										<option value="Tec. Eletrotécnica">Eletrotécnica</option>
										<option value="Tec. Eletrônica">Eletrônica</option>
										<option value="Tec. Química">Química</option>
										<option value="Tec. Mecatrônica">Mecatrônica</option>
									</optgroup>
								</select><br /><br />
								<!-- fim -->

							</div>
							<div class="input3">
								<!-- seleção de turno -->
								<label class="titulo">Turno:</label><br />
								<select class="selentra" name="turno_aluno">
									<option disabled="disabled" selected="selected" value=""></option>
									<option value="SEG/QUA/SEX-Manhã">SEG/QUA/SEX - Manhã</option>
									<option value="SEG/QUA/SEX-Tarde">SEG/QUA/SEX - Tarde</option>
									<option value="SEG/QUA/SEX-Noite">SEG/QUA/SEX - Noite</option>
									<option value="TER/QUI/SAB-Manhã">TER/QUI/SAB - Manhã</option>
									<option value="TER/QUI/SAB-Tarde">TER/QUI/SAB - Tarde</option>
									<option value="TER/QUI/SAB-Noite">TER/QUI/SAB - Noite</option>
								</select><br /><br />
								<!-- fim -->
							</div>
						</div>
						<div class="dividiinput">
							<div class="input1">
								<!-- CPF Aluno -->
								<label class="titulo">CPF:</label><br />
								<input class="txtentra" type="text" name="cpf_aluno" placeholder="Digite o CPF do Aluno" id="cpf" size="85" maxLength="200" required /><br /><br />
								<!-- fim -->

							</div>
							<div class="input2">
								<!-- Data de Nascimento -->
								<label class="titulo">Data de Nascimento:</label><br />
								<input class="txtentradtn" type="date" name="dtn_aluno" id="bn" size="85" maxLength="200" required /><br /><br />
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
				<!-- Bloco de Upload e Download para envio de inserção em massa -->
				<form class="formulario" id="formCadastro" enctype="multipart/form-data" name="formCadastro" method="POST" action="../phpfunc/uploadAluno.php">
					<fieldset>
						<legend>
							Inserir Vagas em Massa
						</legend>
						<?php
						if (isset($_SESSION['msgUpload'])) {
							echo $_SESSION['msgUpload'];
							unset($_SESSION['msgUpload']);
						}
						?>
						<br><br>
						<div class="dividiinput">
							<!-- Upload de Vagas para inserção em massa -->
							<input class="custom-file" type="file" name="arquivo" id="bn" size="85" maxLength="200" required />
							<!-- fim -->
							<!-- Download do arquivo modelo -->
							<a class="btn btn-light btn-md active" role="button" aria-pressed="true" href="../download/cadastrovaga.xml" download>Clique aqui para baixar o modelo</a>
							<!-- fim -->
						</div>
						<br><br>
						<div class="text-center">
							<!-- Botões do Form -->
							<button id="btnEnviar" class="btn btn-success" type="submit">Enviar</button>
							<button id="btnEnviar" class="btn btn-danger" type="reset">Cancelar</button>
							<!-- fim -->
						</div>
					</fieldset>
				</form>
				<br>
				<!-- fim -->
				<!-- Visualização de alunos com modal de detalhes -->
				<div class="container">
					<span id="conteudo"></span><br><br><br>
				</div>
				<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Aluno</h5>
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
					var qnt_result_pg = 9999; //quantidade de registro por página
					var pagina = 1; //página inicial
					$(document).ready(function() {
						listarUser(pagina, qnt_result_pg); //Chamar a função para listar os registros
					});

					function listarUser(pagina, qnt_result_pg) {
						var dados = {
							pagina: pagina,
							qnt_result_pg: qnt_result_pg
						}
						$.post('../phpfunc/listarAluno.php', dados, function(retorna) {
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
								$.post('../phpfunc/visualizarAluno.php', dados, function(retorna) {
									//Carregar o conteúdo para o usuário
									$("#visul_usuario").html(retorna);
									$('#visulUsuarioModal').modal('show');
								});
							}
						});
					});
				</script>
				<!-- fim -->
			</div>

		</main>
		<footer>
			<div class="rodape">
				<div class="rodape1">
					<?php include '../includes/rodape.php' ?>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>
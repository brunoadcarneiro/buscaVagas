<?php
require "../phpfunc/validaLogin.php";
$perm = 'alu';
if (isset($_SESSION["permissao"])) {
	if ($_SESSION["permissao"] == $perm) {
		// Definindo uma seção
		$_SESSION['erro_perm'] = true;
		// Definindo o cabeçalho
		header('Location: ../view/page_403.php');
		// Pára o carregamento da página
		exit;
	}
}
$permadm = 'adm';
$permemp = 'emp';
$permalu = 'alu';

$empresa = $_SESSION["nome_usuario"];
$email = $_SESSION["email_usuario"];
$tel = $_SESSION["tel_usuario"];
$cel = $_SESSION["cel_usuario"];

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
					<h1> Cadastro de Vagas </h1>
				</div>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				<?php
				if ($_SESSION["permissao"] == $permadm) { ?>
					<form class="formulario" id="formCadastro" name="formCadastro" method="POST" action="../phpfunc/recebeCad.php">
						<div className="comp">
							<div class="dividiinput">
								<div class="input1">
									<!-- Nome da Empresa dona da vaga -->
									<label class="titulo">Nome da Empresa:*</label><br />
									<input class="txtentra" type="text" name="empresa" placeholder="Digite o nome da Empresa" id="bn" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- digitar e-mail-->
									<label class="titulo">E-mail:*</label><br />
									<input class="txtentra" type="text" name="email" placeholder="Digite o E-mail" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
							</div>
							<div class="dividiinput">
								<div class="input1">
									<!-- digitar telefone -->
									<label class="titulo">Telefone:</label><br>
									<input id="telefone" class="tel" type="text" name="telefone" size="85" maxLength="200" required placeholder="Digito o numero do celular"><br /><br />
								</div>
								<div class="input2">
									<label class="titulo">Celular:*</label><br>
									<input id="celular" class="cel" type="text" name="celular" size="85" maxLength="200" required placeholder="Digito o numero do celular" required><br /><br />
								</div>
							</div>
							<!-- fim -->
							<div class="dividiinput">
								<div class="input1">
									<!-- digitar Bolsa-->
									<label class="titulo">Valor da Bolsa:*</label><br />
									<input type="text" id="salario" class="txtentra" name="bolsa" placeholder="Digite o Valor" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- Beneficios -->
									<label class="titulo">Benefícios:*</label><br />
									<input class="txtentra" type="text" name="beneficio" id="bn" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
							</div>

							<div class="dividiinput">
								<div class="input1">
									<!-- seleção do tipo de vaga -->
									<label class="titulo">Cargo:</label><br />
									<select class="selentra" name="cargo">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="Estagio">Estágio</option>
										<option value="Emprego">Emprego</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- seleção da unidade -->
									<label class="titulo">Unidade:</label><br>
									<select class="selentra" name="unidade">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="GTC">GTC - BH</option>
										<option value="POLO">Polo - BH</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input3">
									<!-- seleção do curso -->
									<label class="titulo">Curso:*</label><br />
									<select class="selentra" name="curso" required>
										<option selected disabled value=""></option>
										<optgroup label="Tecnologia">
											<option value="Tec. Informática">Informática(T.I)</option>
											<option value="Tec. Redes de Computador">Redes</option>
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
							</div>

							<div class="dividiinput">
								<div class="input1">
									<!-- seleção de turno -->
									<label class="titulo">Turno:</label><br />
									<select class="selentra" name="turno">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="Manhã">Manhã</option>
										<option value="Tarde">Tarde</option>
										<option value="Noite">Noite</option>
										<option value="Integral">Integral</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- seleção de Conhecimentos -->
									<label class="titulo">Requisitos:</label><br />
									<input class="txtentra" type="text" name="requisito" placeholder="Digite os requisitos necessários" id="bn" size="85" maxLength="200" /><br /><br />
									<!-- fim -->
								</div>
							</div>

							<!-- Descrição da vaga -->
							<label class="titulo">Descrição:*</label><br>
							<textarea class="txtarea" placeholder=" Digite o descrição da vaga" name="desc" cols="40" rolls="15" required></textarea><br /><br />
							<!-- fim -->

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
					<form class="formulario" id="formCadastro" enctype="multipart/form-data" name="formCadastro" method="POST" action="../phpfunc/uploadVaga.php">
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
					<!-- Listar vagas na janela cadVaga.php com modal de detalhes -->
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
							$.post('../phpfunc/listarVagaAdm.php', dados, function(retorna) {
								//Subtitui o valor no seletor id="conteudo"
								$("#conteudo").html(retorna);
							});
						}
						//Função no ajax para visualizar uma vaga
						$(document).ready(function() {
							$(document).on('click', '.view_data', function() {
								var user_id = $(this).attr("id");
								//alert(user_id);
								//Verificar se há valor na variável "user_id".
								if (user_id !== '') {
									var dados = {
										user_id: user_id
									};
									$.post('../phpfunc/visualizarVaga.php', dados, function(retorna) {
										//Carregar o conteúdo para o usuário
										$("#visul_usuario").html(retorna);
										$('#visulUsuarioModal').modal('show');
									});
								}
							});
						});
						//Função em ajax para aprovar uma vaga.
						$(document).ready(function() {
							$(document).on('click', '.view_vaga', function() {
								var user_id = $(this).attr("id");
								//alert(user_id);
								var sim = confirm("Deseja realmente aprovar esta vaga?");
								if (sim == true) {
									// Verificar se há valor na variável "user_id".
									if (user_id !== '') {
										var dados = {
											user_id: user_id
										};
										$.ajax({
											url: "../phpfunc/aprovarVaga.php",
											method: 'POST',
											data: {
												user_id: user_id
											},
											success: function(r) {
												alert("Código php executado... " + r);
											},
											error: function(r) {
												alert('deu erro');
											}
										});
									}
								}
							});
						});
						//Função no ajax para deletar uma vaga
						$(document).ready(function() {
							$(document).on('click', '.del_vaga', function() {
								var user_id = $(this).attr("id");
								//alert(user_id);
								var sim = confirm("Deseja realmente apagar essa vaga?");
								if (sim == true) {
									// Verificar se há valor na variável "user_id".
									if (user_id !== '') {
										var dados = {
											user_id: user_id
										};
										$.ajax({
											url: "../phpfunc/deletaVaga.php",
											method: 'POST',
											data: {
												user_id: user_id
											},
											success: function(r) {
												alert("Código php executado... " + r);
												window.location = "cadVaga.php";
												
											},
											error: function(r) {
												alert('deu erro');
											}
										});
									}
								}
							});
						});
					</script>
					<!-- fim -->
				<?php
				} else {
				?>
					<form class="formulario" id="formCadastro" name="formCadastro" method="POST" action="../phpfunc/recebeCad.php">
						<div className="comp">
							<div class="dividiinput" style="display: none;">
								<div class="input1">
									<!-- Nome da Empresa dona da vaga -->
									<label class="titulo">Nome da Empresa:</label><br />
									<input class="txtentra" type="text" name="empresa" id="bn" size="85" maxLength="200" value="<?php echo $empresa; ?>" readonly /><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- digitar e-mail-->
									<label class="titulo">E-mail:*</label><br />
									<input class="txtentra" type="text" name="email" placeholder="Digite o E-mail" size="85" maxLength="200" value="<?php echo $email; ?>" readonly /><br /><br />
									<!-- fim -->
								</div>
							</div>
							<div class="dividiinput" style="display: none;">
								<div class="input1">
									<!-- digitar telefone -->
									<label class="titulo">Telefone:</label><br>
									<input id="" class="tel" type="text" name="telefone" size="85" maxLength="200" value="<?php echo $tel; ?>" readonly /><br /><br />
								</div>
								<div class="input2">
									<label class="titulo">Celular:*</label><br>
									<input id="" class="cel" type="text" name="celular" size="85" maxLength="200" value="<?php echo $cel; ?>" readonly /><br /><br />
								</div>
							</div>
							<!-- fim -->
							<div class="dividiinput">
								<div class="input1">
									<!-- digitar Bolsa-->
									<label class="titulo">Valor da Bolsa:*</label><br />
									<input type="text" id="salario" class="txtentra" name="bolsa" placeholder="Digite o Valor" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- Beneficios -->
									<label class="titulo">Benefícios:*</label><br />
									<input class="txtentra" type="text" name="beneficio" id="bn" size="85" maxLength="200" required /><br /><br />
									<!-- fim -->
								</div>
							</div>

							<div class="dividiinput">
								<div class="input1">
									<!-- seleção do tipo de vaga -->
									<label class="titulo">Cargo:</label><br />
									<select class="selentra" name="cargo">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="Estagio">Estágio</option>
										<option value="Emprego">Emprego</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- seleção da unidade -->
									<label class="titulo">Unidade:</label><br>
									<select class="selentra" name="unidade">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="GTC">GTC - BH</option>
										<option value="POLO">Polo - BH</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input3">
									<!-- seleção do curso -->
									<label class="titulo">Curso:*</label><br />
									<select class="selentra" name="curso" required>
										<option selected disabled value=""></option>
										<optgroup label="Tecnologia">
											<option value="Tec. Informática">Informática(T.I)</option>
											<option value="Tec. Redes de Computador">Redes</option>
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
							</div>

							<div class="dividiinput">
								<div class="input1">
									<!-- seleção de turno -->
									<label class="titulo">Turno:</label><br />
									<select class="selentra" name="turno">
										<option disabled="disabled" selected="selected" value=""></option>
										<option value="Manhã">Manhã</option>
										<option value="Tarde">Tarde</option>
										<option value="Noite">Noite</option>
										<option value="Integral">Integral</option>
									</select><br /><br />
									<!-- fim -->
								</div>
								<div class="input2">
									<!-- seleção de Conhecimentos -->
									<label class="titulo">Requisitos:</label><br />
									<input class="txtentra" type="text" name="requisito" placeholder="Digite os requisitos necessários" id="bn" size="85" maxLength="200" /><br /><br />
									<!-- fim -->
								</div>
							</div>

							<!-- Descrição da vaga -->
							<label class="titulo">Descrição:*</label><br>
							<textarea class="txtarea" placeholder=" Digite o descrição da vaga" name="desc" cols="40" rolls="15" required></textarea><br /><br />
							<!-- fim -->

							<!-- Botões do Form -->
							<div class="botaoDiv">
								<button id="btnEnviar" class="btn btn-success view_data" type="submit">Enviar</button>&nbsp;&nbsp;&nbsp;
								<button id="btnEnviar" class="btn btn-danger view_data" type="reset">Cancelar</button>
							</div>
							<br>
							<!-- fim -->

						</div>
					</form>
				<?php } ?>


			</div>

		</main>
		<footer>
			<?php include '../includes/rodape.php' ?>
		</footer>
	</div>
</body>

</html>
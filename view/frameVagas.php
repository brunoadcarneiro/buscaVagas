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
				<!-- <iframe class="frameVagas" src="../modal/modalVagas.php" class="frameVaga"></iframe> -->
				<div class="container">

					<span id="conteudo"></span>
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
						$.post('../phpfunc/listarVaga.php', dados, function(retorna) {
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
								$.post('../phpfunc/visualizarVaga.php', dados, function(retorna) {
									//Carregar o conteúdo para o usuário
									$("#visul_usuario").html(retorna);
									$('#visulUsuarioModal').modal('show');
								});
							}
						});
					});

					$(document).ready(function() {
						$(document).on('click', '.view_vaga', function() {
							var user_id = $(this).attr("id");
							//alert(user_id);
							var sim = confirm("Deseja realmente se candidatar a essa vaga?");
							if (sim == true) {
								// Verificar se há valor na variável "user_id".
								if (user_id !== '') {
									var dados = {
										user_id: user_id
									};
									$.ajax({
										url: "../phpfunc/candidatarVaga.php",
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
				</script>
			</div>
		</main>
		<footer>
			<?php include '../includes/rodape.php' ?>
		</footer>
	</div>
</body>

</html>
<?php
include_once "../conexao/config.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_user = "SELECT * FROM tbl_vaga ORDER BY id_vaga DESC LIMIT $inicio, $qnt_result_pg";
$resultado_user = mysqli_query($conn, $result_user);


//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_user) and ($resultado_user->num_rows != 0)) {
?>
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
	<input id="search" placeholder="Pesquisar..." type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
	<table id="myTable" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Empresa</th>
				<th>Curso</th>
				<th>Status</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_vaga = mysqli_fetch_assoc($resultado_user)) {
			?>
				<tr>
					<th><?php echo $row_vaga['id_vaga']; ?></th>
					<td><?php echo $row_vaga['empresa']; ?></td>
					<td><?php echo $row_vaga['curso']; ?></td>
					<td><?php if($row_vaga['status_vaga'] == "A") $status_vaga = "Ativo"; if($row_vaga['status_vaga'] == "I") $status_vaga = "Inativo";  echo $status_vaga; ?></td>
					<td class="text-center">
						<button type="button" class="btn btn-success view_data" id="<?php echo $row_vaga['id_vaga']; ?>" title="Ver Detalhes"><i class="fa fa-list" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-primary view_vaga" id="<?php echo $row_vaga['id_vaga']; ?>" title="Aprovar Vaga"><i class="fas fa-check" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger del_vaga" id="<?php echo $row_vaga['id_vaga']; ?>" title="Deletar Vaga"><i class="fas fa-trash" aria-hidden="true"></i></button>
					</td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
        
		$(document).ready(function() {
			$('#search').keyup(function() {
				search_table($(this).val());
			});

			function search_table(value) {
				$('#myTable tr').each(function() {
					var found = 'false';
					$(this).each(function() {
						if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
							found = 'true';
						}
					});
					if (found == 'true') {
						$(this).show();
					} else {
						$(this).hide();
					}
				});
			}
		});
	</script>
<?php
	//Paginação - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(id_vaga) AS num_result FROM tbl_vaga";
	$resultado_pg = mysqli_query($conn, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);

	//Quantidade de pagina
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarVaga(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if ($pag_ant >= 1) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarVaga($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if ($pag_dep <= $quantidade_pg) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarVaga($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarAluno($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
} else {
	echo "<div class='alert alert-danger' role='alert'>Nenhuma vaga cadastrada!</div>";
}
?>
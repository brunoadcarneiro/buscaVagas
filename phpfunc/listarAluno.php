<?php
include_once "../conexao/config.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_user = "SELECT * FROM tbl_aluno ORDER BY id_aluno DESC LIMIT $inicio, $qnt_result_pg";
$resultado_user = mysqli_query($conn, $result_user);


//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_user) and ($resultado_user->num_rows != 0)) {
?>
	<input id="search" placeholder="Pesquisar..." type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
	<table id="myTable" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Aluno</th>
				<th>Curso</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_vaga = mysqli_fetch_assoc($resultado_user)) {
			?>
				<tr>
					<th><?php echo $row_vaga['id_aluno']; ?></th>
					<td><?php echo $row_vaga['nome_aluno']; ?></td>
					<td><?php echo $row_vaga['curso_aluno']; ?></td>
					<td align="center">
						<button type="button" class="btn btn-success view_data" id="<?php echo $row_vaga['id_aluno']; ?>" title="Ver Detalhes"><i class="fa fa-list" aria-hidden="true"></i></button>
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
	$result_pg = "SELECT COUNT(id_aluno) AS num_result FROM tbl_aluno";
	$resultado_pg = mysqli_query($conn, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);

	//Quantidade de pagina
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarAluno(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if ($pag_ant >= 1) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarAluno($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if ($pag_dep <= $quantidade_pg) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listarAluno($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listarAluno($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
} else {
	echo "<div class='alert alert-danger' role='alert'>Nenhum Aluno encontrado!</div>";
}
?>
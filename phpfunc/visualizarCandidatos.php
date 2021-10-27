<?php
if (isset($_POST["user_id"])) {
	include_once "../conexao/config.php";

	$resultado = '';

	$query_user = "SELECT id_user, id_vaga FROM tbl_candidatos WHERE id_vaga='" . $_POST["user_id"] . "'";
	$query_nome_vaga = "SELECT
							v.empresa AS empresa
						FROM
							tbl_candidatos c
						LEFT JOIN
							tbl_vaga v
							ON '" . $_POST["user_id"] . "' = v.id_vaga";
					
	$resultado_user = mysqli_query($conn, $query_user);
	$resultado_empresa = mysqli_query($conn, $query_nome_vaga);
	/* $row_user = mysqli_fetch_assoc($resultado_user); */
	$row_empresa = mysqli_fetch_assoc($resultado_empresa);

	

	/* var_dump($row_user); */
	$resultado .= '<dt class="text-center">' . $row_empresa['empresa'] . '</dt>';
	$resultado .= '<br>';
	$resultado .= '<dl class="row">';
	while ($row_user = mysqli_fetch_assoc($resultado_user)) {
		
		$query_nome_candidato = "SELECT
									u.nome_user AS nome
								FROM
									tbl_candidatos c
								LEFT JOIN
									tbl_user u
									ON u.id_user = '" . $row_user['id_user'] . "'";
		$resultado_nome = mysqli_query($conn, $query_nome_candidato);
		$row_nome = mysqli_fetch_assoc($resultado_nome);
		
		$resultado .= '<dd class="col-sm-9">' . $row_nome['nome'] . '</dd>';
		
	}

	$resultado .= '</dl>';

	echo $resultado;
}

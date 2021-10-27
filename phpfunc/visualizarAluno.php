<?php
if(isset($_POST["user_id"])){
	include_once "../conexao/config.php";
	
	$resultado = '';
	
	$query_user = "SELECT * FROM tbl_aluno WHERE id_aluno = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conn, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['id_aluno'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Nome:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['nome_aluno'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">E-mail:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['email_aluno'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Curso:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['curso_aluno'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Unidade:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['unidade_aluno'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Turno:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['turno_aluno'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}
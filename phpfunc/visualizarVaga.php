<?php
if(isset($_POST["user_id"])){
	include_once "../conexao/config.php";
	
	$resultado = '';
	
	$query_user = "SELECT * FROM tbl_vaga WHERE id_vaga = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conn, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['id_vaga'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Empresa:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['empresa'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Contato:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['email'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Curso:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['curso'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Bolsa:</dt>';
	$resultado .= '<dd class="col-sm-9">R$ '.$row_user['bolsa'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Cargo:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['cargo'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Unidade:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['unidade'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Turno:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['turno'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Descrição:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['descVaga'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}
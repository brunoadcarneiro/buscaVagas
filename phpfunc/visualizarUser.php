<?php
if(isset($_POST["user_id"])){
	include_once "../conexao/config.php";
	
	$resultado = '';
	
	$query_user = "SELECT * FROM tbl_user WHERE id_user = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conn, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	if($row_user['status_user'] == "A")
		$status_user = "Ativo";
	
	if($row_user['status_user'] == "I")
	$status_user = "Inativo";
		


	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['id_user'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Nome</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['nome_user'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">E-mail</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['email_user'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Status:</dt>';
	$resultado .= '<dd class="col-sm-9">' . $status_user . '</dd>';

	$resultado .= '<dt class="col-sm-3">Login</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['login_user'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Senha</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['senha_user'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}
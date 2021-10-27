<?php
if(isset($_POST["user_id"])){
	include_once "../conexao/config.php";
	
	$resultado = '';
	
	$query_user = "SELECT *, DATE_FORMAT(data_contato, '%d/%m/%Y') AS data_contato FROM tbl_contato WHERE id_contato = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conn, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['id_contato'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Nome:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['nome_contato'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">E-mail:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['email_contato'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Unidade:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['unidade_contato'].'</dd>';

	$resultado .= '<dt class="col-sm-3">Motivo do contato:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['motivo_contato'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Data:</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user[strftime('data_contato')].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;
}
<?php
	session_start();
	
	if(!isset($_SESSION["logado"]))
		{
			// Usuário não logado! Redireciona para a página de login
			header('Location: ../view/page_login.html');
			exit;
		}
	
?>
<?php
	session_start();
	include('../conexao/config.php');

	// Recupera o login
	$login = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;
	// Recupera a senha, a criptografando em MD5
	$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
	// Recupera a permissão do usuário
	$tipo = isset($_POST["tipo"]) ? addslashes(trim($_POST["tipo"])) : FALSE;


	$query = "SELECT * FROM tbl_user WHERE login_user = '{$login}' AND tipo_user = '{$tipo}' AND status_user = 'A' ";

	$result = mysqli_query($conn, $query);

	$row = mysqli_num_rows($result);

	if ($row){
		// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
		$dados = mysqli_fetch_array($result);

		// Agora verifica a senha
		/* 	
				Veja o uso da função strcmp na comparação das senhas. 
				Ela está comparando as duas senhas já criptografadas em hash MD5. 
				Lembrando que a função strcmp retorna ZERO caso 2 strings sejam iguais, por isso o uso do operador NOT (!) na frente da mesma. 
			*/

		if (!strcmp($senha, $dados["senha_user"])) {
			// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
			$_SESSION["id_usuario"] = $dados["id_user"];
			$_SESSION["nome_usuario"] = stripslashes($dados["nome_user"]);
			$_SESSION["email_usuario"] = $dados["email_user"];
			$_SESSION["cel_usuario"] = $dados["celular_user"];
			$_SESSION["tel_usuario"] = $dados["telefone_user"];
			$_SESSION["permissao"] = $dados["tipo_user"];
			$_SESSION["logado"] = true;
			$_SESSION['msglogado'] = $dados["nome_user"];
			header("Location: ../view/home.php");
			exit;
		}/* Senha inválida */else {
			$_SESSION['erro_senha'] = true;
			header('Location: ../index.php');
			exit;
		}
	}/* Login inválido */ else {
		$_SESSION['erro_user'] = true;
		header('Location: ../index.php');
		exit;
	}
?>
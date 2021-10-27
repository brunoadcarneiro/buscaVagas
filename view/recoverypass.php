 <?php
 	session_start() 
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Portal de Vagas Grau Técnico</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='theme-color' content="#268829">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/recovery.css">
</head>
<body>	
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3><img src="../img/logograup.png" /></h3>
				</div>
				<div class="card-body">
					<form action="../phpfunc/recovery.php" method="POST" class="signin-form">
						<div class="input-group mb-3">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Usuário" name="usuario" required>	
						</div>
						<div class="form-group">
							<input type="submit" value="Enviar" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
					
					</div>
					<?php
							if(isset($_SESSION['recover'])){
							echo $_SESSION['recover'];
							unset($_SESSION['recover']);
							}
						?>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>	
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>
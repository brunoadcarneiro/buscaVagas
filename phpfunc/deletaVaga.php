<?php
include_once "../conexao/config.php";
session_start();

	if (isset($_POST["user_id"])) {
		if (isset($_SESSION["id_usuario"])) {

			$query_user = "SELECT * FROM tbl_vaga WHERE id_vaga = '" . $_POST["user_id"] . "' LIMIT 1";
			$resultado_user = mysqli_query($conn, $query_user);
			$row_user = mysqli_fetch_assoc($resultado_user);

			$idvaga = $row_user['id_vaga'];
			$idaluno = $_SESSION['id_usuario'];

			$conn = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname); 

            mysqli_select_db($conn,'dbname');
            $sql = "DELETE FROM tbl_vaga WHERE id_vaga = $idvaga";

            if (mysqli_query($conn, $sql)){
                $_SESSION['msgCandidato'] = "Você apagou a vaga do banco de dados.!";
            }
            else {
                $_SESSION['msgCandidato'] = "Falha ao tentar apagar a vaga!";
            }
            mysqli_close($conn);

			echo $_SESSION["msgCandidato"];
		};
	}
?>

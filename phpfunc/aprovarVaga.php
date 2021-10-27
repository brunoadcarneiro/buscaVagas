<?php
include_once "../conexao/config.php";
session_start();

	if (isset($_POST["user_id"])) {
		if (isset($_SESSION["id_usuario"])) {

			$query_user = "SELECT * FROM tbl_vaga WHERE id_vaga = '" . $_POST["user_id"] . "' LIMIT 1";
			$resultado_user = mysqli_query($conn, $query_user);
			$row_user = mysqli_fetch_assoc($resultado_user);

			$idvaga = $row_user['id_vaga'];

			$conn = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname); 

            mysqli_select_db($conn,'dbname');
            $sql = "UPDATE tbl_vaga SET status_vaga='A' WHERE id_vaga = '$idvaga' ";

            if (mysqli_query($conn, $sql)){
                $_SESSION['msgAprova'] = "Você aprovou a vaga com!";
            }
            else {
                $_SESSION['msgAprova'] = "Falha ao aprovar a vaga!";
            }
            mysqli_close($conn);

			echo $_SESSION["msgAprova"];
		};
	}
?>
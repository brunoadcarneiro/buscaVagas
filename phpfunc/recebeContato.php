<?php include_once"../conexao/config.php";?>
<html>
    <body>
        <?php

            session_start();

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);
            $unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);

            $conn = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname); 

            mysqli_select_db($conn,'dbname');
            $sql = "INSERT INTO tbl_contato (nome_contato,email_contato,unidade_contato,motivo_contato,data_contato) VALUES ('$nome', '$email', '$unidade', '$motivo',NOW())";

            if (mysqli_query($conn, $sql)){
                $_SESSION['msg'] = "<div class='alert alert-success'>E-mail enviado com sucesso</div>";
                echo "<script>window.location = '../view/contato.php';</script>";
            }
            else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Usuário não foi cadastrado com sucesso</div";
                echo "<script>window.location = '../view/contato.php';</script>";
            }
            mysqli_close($conn);
        ?>
    </body>
</html>
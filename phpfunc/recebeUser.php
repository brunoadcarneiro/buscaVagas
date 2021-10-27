<?php include_once"../conexao/config.php";?>
<html>
    <body>
        <?php

            session_start();

            $nome = filter_input(INPUT_POST, 'nome_user', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_STRING);
            $telefone = filter_input(INPUT_POST, 'telefone_user', FILTER_SANITIZE_STRING);
            $cel = filter_input(INPUT_POST, 'celular_user', FILTER_SANITIZE_STRING);
            $cpf = filter_input(INPUT_POST, 'cpf_user', FILTER_SANITIZE_STRING);
            $dtn = filter_input(INPUT_POST, 'dtn_user', FILTER_SANITIZE_STRING);
            $login = filter_input(INPUT_POST, 'login_user', FILTER_SANITIZE_STRING);
            $senha = MD5($_POST['senha_user']);
            $perm_user = filter_input(INPUT_POST, 'perm_user', FILTER_SANITIZE_STRING);
            $estado = filter_input(INPUT_POST, 'status_user', FILTER_SANITIZE_STRING);

            $conn = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname); 

            mysqli_select_db($conn,'dbname');
            $sql = "INSERT INTO tbl_user (nome_user,email_user,telefone_user,celular_user,cpf_user,dtn_user,login_user,senha_user,tipo_user,status_user) VALUES ('$nome', '$email', '$telefone', '$cel','$cpf','$dtn','$login','$senha','$perm_user','$estado')";

            if (mysqli_query($conn, $sql)){
                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso</div>";
                echo "<script>window.location = '../view/cadUser.php';</script>";
            }
            else {
                $_SESSION['msg'] = "<div><p>Usuário não foi cadastrado com sucesso</p></div";
                echo "<script>window.location = '../view/cadUser.php';</script>" . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        ?>
    </body>
</html>
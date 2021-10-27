<?php include_once"../conexao/config.php";?>
<html>
    <body>
        <?php

            session_start();

            $empresa = $_POST["empresa"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $cel = $_POST["celular"];
            $valor = $_POST["bolsa"];
            $beneficio = $_POST["beneficio"];
            $cargo = $_POST["cargo"];
            $unidade = $_POST["unidade"];
            $curso = $_POST["curso"];
            $turno = $_POST["turno"];
            $marcados = $_POST["requisito"];
            $desc = $_POST["desc"];

            $conn = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname); 

            mysqli_select_db($conn,'dbname');
            $sql = "INSERT INTO tbl_vaga (empresa,email,telefone,celular,bolsa,beneficio,cargo,unidade,curso,turno,requisito,descVaga,status_vaga) VALUES ('$empresa', '$email', '$telefone', '$cel', '$valor', '$beneficio', '$cargo', '$unidade', '$curso', '$turno', '$marcados', '$desc','I')";
            if (mysqli_query($conn, $sql)){
                $_SESSION['msg'] = "<div class='alert alert-success'>Vaga cadastrada com sucesso</div>";
                echo "<script>window.location = '../view/cadVaga.php';</script>";
            }
            else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Vaga não foi cadastrada com sucesso</div";
                echo "<script>window.location = '../view/cadVaga.php';</script>" . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        ?>
    </body>
</html>
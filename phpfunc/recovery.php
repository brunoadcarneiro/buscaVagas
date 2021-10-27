<?php
session_start();
include('../conexao/config.php');?>
<html>
    <body>
        <?php

           
            $email = $_POST["usuario"];

            $_SESSION['recover'] = "<div class='alert alert-success'>Solicitação enviada</div>";
                echo "<script>window.location = '../view/recoverypass.php';</script>";
           
        ?>
    </body>
</html>
<?php include_once"../conexao/config.php";?>
<html>
    <body>
        <?php

            
            $cadastro = $_POST["cad"];
            
            switch($cadastro){
                case 'al';
                    echo "<script>window.location = '../view/cadAluno.php';</script>";
                break;

                case 'vg';
                    echo "<script>window.location = '../view/cadVaga.php';</script>";
                break;

                case 'us';
                    echo "<script>window.location = '../view/cadUser.php';</script>";
                break;

                default:
                    echo "<script>alert('Tipo de Cadastro não Selecionado'); window.location = '../view/selectCad.php';</script>";
                break;
                
            }
        ?>
    </body>
</html>
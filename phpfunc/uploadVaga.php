<?php

include_once "../conexao/config.php";
session_start();
?>

<html>

<body>
    <?php
    if (!empty($_FILES['arquivo']['tmp_name'])) {
        $arquivo = new DomDocument();
        $arquivo->load($_FILES['arquivo']['tmp_name']);
        /* var_dump($arquivo); */

        $linhas = $arquivo->getElementsByTagName("Row");
        /* var_dump($linhas); */

        $primeira_linha = true;

        foreach ($linhas as $linha) {
            if ($primeira_linha == false) {
                if (isset($_SESSION['msgUpload'])) {
                    echo $_SESSION['msgUpload'];
                    unset($_SESSION['msgUpload']);
                }
                $empresa = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                $email = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                $telefone = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                $cel = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                $valor = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                $beneficio = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                $cargo = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                $unidade = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                $curso = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                $turno = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                $marcados = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                $desc = $linha->getElementsByTagName("Data")->item(11)->nodeValue;

                $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
                mysqli_select_db($conn, 'dbname');
                $sql = "INSERT INTO tbl_vaga (empresa,email,telefone,celular,bolsa,beneficio,cargo,unidade,curso,turno,requisito,descVaga,status_vaga) 
                    VALUES ('$empresa', '$email', '$telefone', '$cel', '$valor', '$beneficio', '$cargo', '$unidade', '$curso', '$turno', '$marcados', '$desc','I')";

                if (mysqli_query($conn, $sql)) {
                    $_SESSION['msgUpload'] = "<div class='alert alert-success'>Importação de vagas realizada com sucesso.</div>";
                }
                mysqli_close($conn);
            }
            $primeira_linha = false;
        }
        echo "<script>window.location = '../view/cadVaga.php';</script>";
    }
    ?>
</body>

</html>
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

                $nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                $email = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                $telefone = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                $cel = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                $cpf = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                $curso = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                $dtn = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                $turno = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                $unidade = $linha->getElementsByTagName("Data")->item(8)->nodeValue;

                $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);

                mysqli_select_db($conn, 'dbname');
                $sql = "INSERT INTO tbl_aluno (nome_aluno,email_aluno,telefone_aluno,celular_aluno,cpf_aluno,unidade_aluno,curso_aluno,turno_aluno,dtn_aluno) 
                        VALUES ('$nome', '$email', '$telefone', '$cel','$cpf', '$unidade', '$curso', '$turno', '$dtn')";

                if (mysqli_query($conn, $sql)) {
                    $_SESSION['msgUpload'] = "<div class='alert alert-success'><p>Alunos importados com sucesso.</p></div>";
                }
                mysqli_close($conn);
            }
            $primeira_linha = false;
        }
        echo "<script>window.location = '../view/cadAluno.php';</script>";
    }
    ?>
</body>

</html>
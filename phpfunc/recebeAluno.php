<?php include_once "../conexao/config.php"; ?>
<html>

<body>
    <?php

    session_start();

    $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone_aluno', FILTER_SANITIZE_STRING);
    $cel = filter_input(INPUT_POST, 'celular_aluno', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf_aluno', FILTER_SANITIZE_STRING);
    $curso = filter_input(INPUT_POST, 'curso_aluno', FILTER_SANITIZE_STRING);
    $dtn = filter_input(INPUT_POST, 'dtn_aluno', FILTER_SANITIZE_STRING);
    $turno = filter_input(INPUT_POST, 'turno_aluno', FILTER_SANITIZE_STRING);
    $unidade = filter_input(INPUT_POST, 'unidade_aluno', FILTER_SANITIZE_STRING);

    $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);

    mysqli_select_db($conn, 'dbname');
    $sql = "INSERT INTO tbl_aluno (nome_aluno,email_aluno,telefone_aluno,celular_aluno,cpf_aluno,unidade_aluno,curso_aluno,turno_aluno,dtn_aluno) 
            VALUES ('$nome', '$email', '$telefone', '$cel','$cpf', '$unidade', '$curso', '$turno', '$dtn')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Aluno cadastrado com sucesso</div>";
        echo "<script>window.location = '../view/cadAluno.php';</script>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'><p>Aluno não foi cadastrado com sucesso</p></div";
        echo "<script>window.location = '../view/cadAluno.php';</script>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>
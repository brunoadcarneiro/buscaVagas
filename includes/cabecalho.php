<?php

$permadm = 'adm';
$permemp = 'emp';
$permalu = 'alu';


?>

<div class="header1">
    <nav class="navbar navbar-expand-lg navbar-light menu1">
        <a class="nav-link" href="https://www.grautecnico.com.br/"><img src="../img/logograup.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"></li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(página atual)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="frameVagas.php">Vagas <span class="sr-only">(página atual)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="contato.php">Contato <span class="sr-only">(página atual)</span></a>
                    </li>
                    <?php
                    if ($_SESSION["permissao"] == $permadm) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header" style="background-color: #f1f1f1; font-size: 18px;">
                                    <?php
                                    if (isset($_SESSION['msglogado'])) {
                                        echo $_SESSION['msglogado'];
                                    }
                                    ?>
                                </h6>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-item-header p-0 m-0" style="font-size: 22px; border-bottom: 2px solid #f1f1f1;">Cadastro</h6>
                                <a class="dropdown-item" href="cadAluno.php">Alunos</a>
                                <a class="dropdown-item" href="cadUser.php">Usuários</a>
                                <a class="dropdown-item" href="cadVaga.php">Vagas</a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-item-header p-0 m-0" style="font-size: 22px; border-bottom: 2px solid #f1f1f1;">Relatório</h6>
                                <a class="dropdown-item" href="frameCandidatos.php">Candidatos</a>
                                <a class="dropdown-item" href="frameContatos.php">Contatos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../phpfunc/logout.php">Logout</a>
                            </div>
                        </li>
                    <?php
                    }
                    if ($_SESSION["permissao"] == $permemp) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header" style="background-color: #f1f1f1; font-size: 18px;">
                                    <?php
                                    if (isset($_SESSION['msglogado'])) {
                                        echo $_SESSION['msglogado'];
                                    }
                                    ?>
                                </h6>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-item-header p-0 m-0" style="font-size: 22px; border-bottom: 2px solid #f1f1f1;">Cadastro</h6>
                                <a class="dropdown-item" href="cadVaga.php">Vagas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../phpfunc/logout.php">Logout</a>
                            </div>
                        </li>
                    <?php
                    }
                    if ($_SESSION["permissao"] == $permalu) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header" style="background-color: #f1f1f1; font-size: 18px;">
                                    <?php
                                    if (isset($_SESSION['msglogado'])) {
                                        echo $_SESSION['msglogado'];
                                    }
                                    ?>
                                </h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../phpfunc/logout.php">Logout</a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </form>
        </div>
    </nav>
</div>
<?php

    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Seja Bem Vindo!</title>
    <?php include_once '_head.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Sistema Financeiro.</h2>
                        <h5>Seja bem vindo! Aqui você poderá utilizar todos os módulos disponívei do MENU a esquerda.</h5>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
</body>
</html>
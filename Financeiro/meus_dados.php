<?php

    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    require_once '../DAO/UsuarioDAO.php';

    $objDAO = new UsuarioDAO();

    if(isset($_POST['btnGravar'])){
        $nome = trim($_POST['nomeUsuario']);
        $email = trim($_POST['emailUsuario']);

        $ret = $objDAO->GravarMeusDados($nome,$email);

        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Nome! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Email! </div>';
        }
        elseif($ret == -3){
            $msg = '<div class="alert alert-warning">
            E-mail já cadastrado. Coloque um outro e-mail!</div>';
        }
        elseif($ret == 1){
            $msg = '<div class="alert alert-success">
            Ação realizada com sucesso! </div>';
        }
        elseif($ret == 0){
            $msg = '<div class="alert alert-warning">
            Ocorreu um erro na opereção! </div>';
        }
    }

    $dados = $objDAO->CarregarMeusDados();

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
                        <span>
                            <?= isset($msg) ? $msg : '' ?>
                        </span>
                        <h2>Meus Dados.</h2>
                        <h5>Aqui você podera alterar seus dados cadastrados.</h5>
                    </div>
                </div>
                <hr />
                <form action="meus_dados.php" method="post">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input class="form-control" placeholder="Digite seu Nome aqui..." name="nomeUsuario" id="nomeUsuario" value="<?= $dados[0]['nome_usuario'] ?>" maxlength="60"/>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" placeholder="Digite seu E-mail aqui..." name="emailUsuario" id="emailUsuario" value="<?= $dados[0]['email_usuario'] ?>" maxlength="35"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarMeusDados()" name="btnGravar">Gravar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
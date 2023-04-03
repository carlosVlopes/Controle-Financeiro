<?php

    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnAcessar'])){
        $email = trim($_POST['emailusuario']);
        $senha = trim($_POST['senhaUsuario']);

        $objDAO = new UsuarioDAO();

        $ret = $objDAO->ValidarLogin($email,$senha);

        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Email! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Senha! </div>';
        }
    }

?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Cadastrar</title>
    <?php include_once '_head.php';?>
</head>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <span>
                    <?= isset($msg) ? $msg : '' ?>
                </span>
                <h2>Controle Financeiro</h2>
                <h5>(Faça seu Login de acesso!)</h5>
                <br />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Digite os dados do seu Login:</strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" placeholder="Seu E-mail" name="emailusuario" id="emailusuario" value="<?= isset($email) ? $email : '' ?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Sua Senha" name="senhaUsuario" id="senhaUsuario" value="<?= isset($senha) ? $senha : '' ?>"/>
                            </div>
                            <button class="btn btn-primary" onclick="return ValidarLogin()" name="btnAcessar" >Acessar</button>
                            <hr />
                            <span>Ainda não possui uma conta? </span><a href="cadastro.php">Clique aqui...</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
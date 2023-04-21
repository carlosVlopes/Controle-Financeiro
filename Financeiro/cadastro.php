<?php

    
    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $nome = ltrim(trim($_POST['nomeUsuario']));
        $email = ltrim(trim($_POST['emailUsuario']));
        $senha = ltrim(trim($_POST['senha']));
        $rSenha = ltrim(trim($_POST['rSenha']));

        $objDAO = new UsuarioDAO();

        $ret = $objDAO->CriarCadastro($nome,$email,$senha,$rSenha);

        if($ret == 1){
            $msg = '<div class="alert alert-success">
            Ação realizada com sucesso! </div>';
        }
        elseif($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Nome! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Email! </div>';
        }
        elseif($ret == -3){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Senha! </div>';
        }
        elseif($ret == -4){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Repita sua Senha! </div>';
        }
        elseif($ret == -5){
            $msg = '<div class="alert alert-warning">
            A senha deverá conter no mínimo 6 caracteres!</div>';
        }
        elseif($ret == -6){
            $msg = '<div class="alert alert-warning">
            As senhas devem ser iguais!</div>';
        }
        elseif($ret == -7){
            $msg = '<div class="alert alert-warning">
            E-mail já cadastrado. Coloque um outro e-mail!</div>';
        }
    }

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Cadastrar</title>
    <?php include_once '_head.php'?>
</head>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <span>
                    <?= isset($msg) ? $msg : '' ?>
                </span>
                <h2>Sistema Financeiro: Cadastro</h2>
                <h5>(Registre seu Cadastro aqui!)</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Novo Usuário? Cadastre-se agora:</strong>
                    </div>
                    <div class="panel-body">
                        <form action="cadastro.php" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Seu Nome" name="nomeUsuario" id="nomeUsuario" value="<?= isset($nome) ? $nome : '' ?>" maxlength="60"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Seu E-mail" name="emailUsuario" id="emailUsuario" value="<?= isset($email) ? $email : '' ?>" maxlength="35"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Sua Senha (Mínimo 6 caracteres!)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>" maxlength="8"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita sua Senha" name="rSenha" id="rSenha" value="<?= isset($rSenha) ? $rSenha : '' ?>"/>
                            </div>
                            <button class="btn btn-success" onclick="return ValidarCadastro()" name="btnCadastrar" >Cadastrar</button>
                            <hr />
                            <span>Já possui uma Conta? </span><a href="index.php">Clique aqui...</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
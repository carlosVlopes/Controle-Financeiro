<?php

    require_once '../DAO/ContaDAO.php';
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    if(isset($_POST['btnGravar'])){
        $banco = trim($_POST['nomeBanco']);
        $agencia = trim($_POST['agencia']);
        $numero = trim($_POST['numeroConta']);
        $saldo = trim($_POST['saldoConta']);

        $objDAO = new ContaDAO();

        $ret = $objDAO->CadastrarConta($banco, $agencia, $numero, $saldo);

        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Nome do Banco! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Agência! </div>';
        }
        elseif($ret == -3){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Número da Conta! </div>';
        }
        elseif($ret == -4){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Saldo! </div>';
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

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Nova Conta</title>
    <?php include_once '_head.php'?>
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
                        <h2>Cadastrar Conta</h2>
                        <h5>Aqui você podera Cadastrar todas as suas Contas Bancárias.</h5>
                    </div>
                </div>
                <hr />
                <form action="nova_conta.php" method="post">
                    <div class="form-group">
                        <label>Nome do Banco:</label>
                        <input class="form-control" placeholder="Digite o Nome do Banco..." name="nomeBanco" id="nomeBanco" value="<?= isset($banco) ? $banco : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Agência:</label>
                        <input class="form-control" placeholder="Digite a Agência..." name="agencia" id="agencia" value="<?= isset($agencia) ? $agencia : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Número da Conta:</label>
                        <input class="form-control" placeholder="Digite o Número da Conta..." name="numeroConta" id="numeroConta" value="<?= isset($numero) ? $numero : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Saldo:</label>
                        <input class="form-control" placeholder="Digite o Saldo da Conta..." name="saldoConta" id="saldoConta" value="<?= isset($saldo) ? $saldo : '' ?>"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarConta()" name="btnGravar">Gravar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
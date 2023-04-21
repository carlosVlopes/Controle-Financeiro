<?php

    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    require_once '../DAO/ContaDAO.php';

    $dao = new ContaDAO();

    if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

        $idConta = $_GET['cod'];
        $dados = $dao->DetalharConta($idConta);

        // se tem alguma coisa dentro do ARRAY dados
        if (count($dados) == 0) {
            header('location: consultar_conta.php');
            exit;
        }
    }
    elseif (isset($_POST['btnSalvar'])) {
        $idConta = $_POST['cod'];
        $banco = $_POST['banco_conta'];
        $numero = $_POST['numero_conta'];
        $agencia = $_POST['agencia_conta'];
        $saldo = $_POST['saldo_conta'];

        $ret = $dao->AlterarConta($idConta,$banco,$numero,$agencia,$saldo);

        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    } elseif (isset($_POST['btnExcluir'])) {
        $idConta = $_POST['cod'];
        $ret = $dao->ExcluirConta($idConta);

        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    } else {
        header('location: consultar_Conta.php');
        exit;
    }



?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Alterar | Excluir Contas</title>
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você podera AlTERAR ou EXCLUIR suas Contas Bancárias!</h5>
                    </div>
                </div>
                <hr />
                <form action="alterar_conta.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                    <div class="form-group">
                        <label>Nome do Banco:</label>
                        <input class="form-control" placeholder="Digite o Nome do Banco..." name="banco_conta" id="banco_conta" value="<?= $dados[0]['banco_conta'] ?>" maxlength="30"/>
                    </div>
                    <div class="form-group">
                        <label>Agência:</label>
                        <input class="form-control" placeholder="Digite a Agência..." name="agencia_conta" id="agencia_conta" value="<?= $dados[0]['agencia_conta'] ?>" maxlength="8"/>
                    </div>
                    <div class="form-group">
                        <label>Número da Conta:</label>
                        <input class="form-control" placeholder="Digite o Número da Conta..." name="numero_conta" id="numero_conta" value="<?= $dados[0]['numero_conta'] ?>" maxlength="20"/>
                    </div>
                    <div class="form-group">
                        <label>Saldo:</label>
                        <input class="form-control" placeholder="Digite o Saldo da Conta..." name="saldo_conta" id="saldo_conta" value="<?= $dados[0]['saldo_conta'] ?>"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarConta()" name="btnSalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Comfirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a conta: <b><?= $dados[0]['banco_conta']?> / <?= $dados[0]['agencia_conta']?> - <?= $dados[0]['numero_conta'] ?> ?</span></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
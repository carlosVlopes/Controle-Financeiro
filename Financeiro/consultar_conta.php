<?php

    require_once '../DAO/ContaDAO.php';
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    $dao = new ContaDAO();
    $contas = $dao->ConsultarConta();

    if(isset($_GET['ret'])){
        $ret = $_GET['ret'];

        if($ret == 1){
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
    <title>Consultar Contas</title>
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
                        <h2>Consultar Contas</h2>
                        <h5>Consulte todas as suas Contas Bancárias aqui!</h5>
                        <span>
                            <?= isset($msg) ? $msg : '' ?>
                        </span>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contas Bancárias Cadastradas. Caso deseje alterar, clique no Botão ALTERAR.
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome do Banco</th>
                                            <th>Agência</th>
                                            <th>Número</th>
                                            <th>Saldo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($contas as $item) { ?>
                                            <tr class="odd gradeX">
                                                <td><?= $item['banco_conta'] ?></td>
                                                <td><?= $item['agencia_conta'] ?></td>
                                                <td><?= $item['numero_conta'] ?></td>
                                                <td>R$ <?= $item['saldo_conta'] ?></td>
                                                <td><a href="alterar_conta.php?cod=<?= $item['id_conta'] ?>"><button class="btn btn-warning">Alterar</button></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
</body>
</html>
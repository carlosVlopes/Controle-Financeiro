<?php

    require_once '../DAO/EmpresaDAO.php';

    $dao = new EmpresaDAO();
    $empresas = $dao->ConsultarEmpresa();

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
    <title>Consultar Empresa</title>
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
                        <h2>Consultar Empresas</h2>
                        <h5>Consulte todas as suas Empresas aqui!</h5>
                        <span>
                            <?= isset($msg) ? $msg : '' ?>
                        </span>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Empresas Cadastradas. Caso deseje alterar, clique no Botão ALTERAR.
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome da Empresa</th>
                                            <th>Telefone/Whatsapp</th>
                                            <th>Endereço</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($empresas as $item) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $item['nome_empresa']?></td>
                                            <td><?= $item['telefone_empresa']?></td>
                                            <td><?= $item['endereco_empresa']?></td>
                                            <td><a href="alterar_empresa.php?cod=<?= $item['id_empresa'] ?>"><button class="btn btn-warning">Alterar</button></a></td>
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
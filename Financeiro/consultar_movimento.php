<?php

    require_once '../DAO/MovimentoDAO.php';

    if(isset($_POST['btnPesquisar'])){
        $tipo = $_POST['tipo'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];

        $objDAO = new MovimentoDAO();

        $ret = $objDAO->ConsultarMovimento($tipo,$dataInicial,$dataFinal);
        
        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Tipo! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Data Inicial! </div>';
        }
        elseif($ret == -3){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Data Final! </div>';
        }
    }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Consultar Movimentos</title>
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
                        <h2>Consultar Movimentos</h2>
                        <h5>Aqui você podera consultar todos os movimentos financeiros de ENTRADA e SAÍDA.</h5>
                    </div>
                </div>
                <hr />
                <form action="consultar_movimento.php" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de Movimento:</label>
                            <select class="form-control" name="tipo" id="tipo" value="<?= isset($tipo) ? $tipo : '' ?>>
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saida</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial:</label>
                            <input class="form-control" type="date" name="dataInicial" id="dataInicial" value="<?= isset($dataInicial) ? $dataInicial : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final:</label>
                            <input class="form-control" type="date" name="dataFinal" id="dataFinal" value="<?= isset($dataFinal) ? $dataFinal : '' ?>">
                        </div>
                    </div>
                    <div style="text-align: center;" class="form_group">
                        <button class="btn btn-primary" onclick="return ValidarConsultaPeriodo()" name="btnPesquisar">Pesquisar</button>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <span>Aqui você pode consultar todos os movimentos realizados ou se desejar, excluir.</span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            <th>Categoria</th>
                                            <th>Empresa</th>
                                            <th>Conta</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>[Tipo de Movimento]</td>
                                            <td>[Data]</td>
                                            <td>[Valor]</td>
                                            <td>[Categoria]</td>
                                            <td>[Empresa]</td>
                                            <td>[Conta]</td>
                                            <td><button class="btn btn-danger" name="btnExcluir">Excluir</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<?php

    require_once '../DAO/MovimentoDAO.php';

    if(isset($_POST['btnSalvar'])){
        $tipo = $_POST['tipo'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        $empresa = $_POST['empresa'];
        $conta = $_POST['conta'];
        $obs = $_POST['obs'];

        $objDAO = new MovimentoDAO();

        $ret = $objDAO->RealizarMovimento($tipo,$data,$valor,$categoria,$empresa,$conta);

        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Tipo! </div>';
        }
        elseif($ret == -2){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Data! </div>';
        }
        elseif($ret == -3){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Valor! </div>';
        }
        elseif($ret == -4){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Categoria! </div>';
        }
        elseif($ret == -5){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Empresa! </div>';
        }
        elseif($ret == -6){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Conta! </div>';
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
    <title>Realizar Movimento</title>
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
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você podera realizar os seus Movimentos de ENTRADA e SAIDA.</h5>
                    </div>
                </div>
                <hr />
                <form action="realizar_movimento.php" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo de Movimento:</label>
                            <select class="form-control" name="tipo" id="tipo" value="<?= isset($tipo) ? $tipo : '' ?>" >
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saida</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Data:</label>
                            <input class="form-control" type="date" name="data" id="data" value="<?= isset($data) ? $data : '' ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Valor:</label>
                            <input class="form-control" placeholder="Digite o valor do Movimento..." name="valor" id="valor" value="<?= isset($valor) ? $valor : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Categoria:</label>
                            <select class="form-control" name="categoria" id="categoria" value="<?= isset($categoria) ? $categoria : '' ?>">
                                <option value="">Selecione</option>
                                <option value="1">teste</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="empresa" id="empresa" value="<?= isset($empresa) ? $empresa : '' ?>">
                                <option>Selecione</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Conta:</label>
                            <select class="form-control" name="conta" id="conta" value="<?= isset($conta) ? $conta : '' ?>" >
                                <option>Selecione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (Opcional):</label>
                            <textarea class="form-control" rows="3" placeholder="Digite a Observação aqui..." name="obs" id="obs" value="<?= isset($obs) ? $obs : '' ?>"></textarea>
                        </div>
                        <div style="text-align: center;">
                            <button class="btn btn-success" onclick="return ValidarMovimento()" name="btnSalvar">Finalizar Lançamento</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
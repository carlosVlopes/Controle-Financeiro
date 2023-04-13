<?php

require_once '../DAO/MovimentoDAO.php';
$tipo = '';

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];

    $dao = new MovimentoDAO();

    $movs = $dao->ConsultarMovimento($tipo, $dataInicial, $dataFinal);

    if ($movs == -1) {
        $msg = '<div class="alert alert-warning">
            Preencha o campo Data Inicial!  </div>';
    }elseif($movs == -2) {
        $msg = '<div class="alert alert-warning">
            Preencha o campo Data Final!  </div>';
    }
}
elseif(isset($_POST['btnExcluir'])){
    $idMovimento = $_POST['idMovimento'];
    $idConta = $_POST['idConta'];
    $valorMovimento = $_POST['valorMovimento'];
    $tipoMovimento = $_POST['tipoMovimento'];

    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMovimento,$idConta,$valorMovimento,$tipoMovimento);
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
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="0" <?= $tipo == '0' ? 'selected' : ''?>>Todos</option>
                                <option value="1" <?= $tipo == '1' ? 'selected' : ''?>>Entrada</option>
                                <option value="2" <?= $tipo == '2' ? 'selected' : ''?>>Saida</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial:</label>
                            <input class="form-control" type="date" name="dataInicial" id="dataInicial"
                                value="<?= isset($dataInicial) ? $dataInicial : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final:</label>
                            <input class="form-control" type="date" name="dataFinal" id="dataFinal"
                                value="<?= isset($dataFinal) ? $dataFinal : '' ?>">
                        </div>
                    </div>
                    <div style="text-align: center;" class="form_group">
                        <button class="btn btn-primary" onclick="return ValidarConsultaPeriodo()"
                            name="btnPesquisar">Pesquisar</button>
                    </div>
                </form>
                <hr>
                <?php if(isset($movs)) { ?>
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
                                            <th>Observação</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; for($i = 0; $i < count($movs); $i++){ 
                                            if($movs[$i]['tipo_movimento'] == 1){
                                                $total = $total + $movs[$i]['valor_movimento'];
                                            } else{
                                                $total = $total - $movs[$i]['valor_movimento'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída'?></td>
                                                <td><?= $movs[$i]['data_movimento']?></td>
                                                <td><?= number_format($movs[$i]['valor_movimento'] , 2, ',', '.')?></td>
                                                <td><?= $movs[$i]['nome_categoria']?></td>
                                                <td><?= $movs[$i]['nome_empresa']?></td>
                                                <td><?= $movs[$i]['banco_conta']?> / Ag. <?= $movs[$i]['agencia_conta']?> - Núm. <?= $movs[$i]['numero_conta']?></td>
                                                <td><?= $movs[$i]['obs_movimento']?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $i ?>" class="btn btn-danger">Excluir</a>
                                                    <form action="consultar_movimento.php" method="post">
                                                        <input type="hidden" name="idMovimento" value="<?= $movs[$i]['id_movimento'] ?>" >
                                                        <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                        <input type="hidden" name="valorMovimento" value="<?= $movs[$i]['valor_movimento'] ?>" >
                                                        <input type="hidden" name="tipoMovimento" value="<?= $movs[$i]['tipo_movimento'] ?>" >
                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Comfirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <span>Deseja excluir o movimento: </span><br>
                                                                        <b>Data Movimento: <?= $movs[$i]['data_movimento'] ?></b><br>
                                                                        <b>Tipo Movimento: <?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída'?></b><br>
                                                                        <b>Valor Movimento: <?= $movs[$i]['valor_movimento'] ?></b><br>
                                                                        <b>Categoria: <?= $movs[$i]['nome_categoria']?></b><br>
                                                                        <b>Empresa: <?= $movs[$i]['nome_empresa']?></b><br>
                                                                        <b>Conta: <?= $movs[$i]['banco_conta']?> / Ag. <?= $movs[$i]['agencia_conta']?> - Núm. <?= $movs[$i]['numero_conta']?></b><br>
                                                                        <b>Observação: <?= $movs[$i]['obs_movimento']?></b><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <label style="color: <?= $total >= 0 ? 'green' : 'red'?>;"> Valor total: <?= number_format($total, 2 , ',', '.') ?></label>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
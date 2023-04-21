<?php
    require_once '../DAO/MovimentoDAO.php';
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();

    $dao = new MovimentoDAO();
    $totalEntrada = $dao->TotalEntrada();
    $totalSaida = $dao->TotalSaida(); 
    $movs = $dao->MostrarUltimosLancamentos();

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
                        <h2>Sistema Financeiro.</h2>
                        <h5>Seja bem vindo! Aqui você poderá utilizar todos os módulos disponívei do MENU a esquerda.</h5>
                    </div>
                </div>
                <hr />
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= number_format($totalEntrada[0]['total'], 2, ',' , '.') ?></h3>
                        </div>
                        <div class="panel-footer back-footer-green" >
                            <span>TOTAL DE ENTRADA</span>
                        </div>
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?=  number_format($totalSaida[0]['total'], 2, ',' , '.') ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red" >
                            <span>TOTAL DE SAÍDA</span>
                        </div>
                    </div>     
                </div>
                <hr>
                <?php if(count($movs) > 0) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Ultimos 10 lançamentos de Movimento.</span>
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
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <label style="color: <?= $total >= 0 ? 'green' : 'red'?>;"> Valor total: <?= number_format($total, 2 , ',', '.') ?></label>
                            </div>
                        </div>
                    </div>
                <?php } else{ ?>
                    <center>
                        <div class="alert alert-info col-md-12">
                            Não existe nenhum movimento para ser exibido.
                        </div>
                    </center>
                <?php } ?>
            </div>
        </div>
    </div>
</body> 
</html>
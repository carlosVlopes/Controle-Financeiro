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
                                            <th></th>
                                            <th>Saldo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>[Nome do Banco]</td>
                                            <td>[Agência]</td>
                                            <td>[Número da Conta]</td>
                                            <td>[Saldo]</td>
                                            <td><a href="alterar_conta.php"><button class="btn btn-warning">Alterar</button></a></td>
                                        </tr>
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
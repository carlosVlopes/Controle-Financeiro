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
                                        <tr class="odd gradeX">
                                            <td>teste</td>
                                            <td>3333333</td>
                                            <td>Rua Empresa</td>
                                            <td><a href="alterar_empresa.php"><button class="btn btn-warning">Alterar</button></a></td>
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
<?php

    require_once '../DAO/CategoriaDAO.php';

    $dao = new CategoriaDAO();
    $categorias = $dao->ConsultarCategoria();

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
    <title>Consultar Categoria</title>
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
                        <h2>Consultar Categoria</h2>
                        <h5>Consulte todas suas categorias aqui</h5>
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
                                Categorias Cadastradas. Caso deseje alterar, clique no Botão ALTERAR.
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome da Categoria</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach($categorias as $item){ ?>
                                            <tr class="odd gradeX">
                                                <td><?= $item['nome_categoria']?></td>
                                                <td><a href="alterar_categoria.php?cod=<?= $item['id_categoria']?>"><button class="btn btn-warning">Alterar</button></a></td>
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
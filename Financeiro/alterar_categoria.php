<?php

    require_once '../DAO/CategoriaDAO.php';

    $dao = new CategoriaDAO();

    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){

        $idCategoria = $_GET['cod'];
        $dados = $dao->DetalharCategoria($idCategoria);

        // se tem alguma coisa dentro do ARRAY dados
        if(count($dados) == 0){
            header('location: consultar_categoria.php');
            exit;
        }
    }elseif(isset($_POST['btnSalvar'])){
        $idCategoria = $_POST['cod'];
        $nomeCategoria = $_POST['nomeCategoria'];

        $ret = $dao->AlterarCategoria($nomeCategoria,$idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
    }
    elseif(isset($_POST['btnExcluir'])){

    }

    else{
        header('location: consultar_categoria.php');
        exit;
    }

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Alterar | Excluir Categoria</title>
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
                        <h2>Alterar Categoria</h2>
                        <h5>Aqui você irá alterar a Categoria selecionada.</h5>
                    </div>
                </div>
                <hr />
                <form action="alterar_categoria.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                    <div class="form-group">
                        <label>Nome da Categoria:</label>
                        <input class="form-control" placeholder="Digite sua Categoria..." name="nomeCategoria" id="nomeCategoria" value="<?= $dados[0]['nome_categoria'] ?>"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarCategoria()" name="btnSalvar">Salvar</button>
                    <button class="btn btn-danger" name="btnExcluir">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
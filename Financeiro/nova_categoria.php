<?php

    require_once '../DAO/CategoriaDAO.php';
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    if(isset($_POST['btnSalvar'])){
        $nome = ltrim(trim($_POST['nomeCategoria']));

        $objDAO = new CategoriaDAO();

        $ret = $objDAO->CadastrarCategoria($nome);
        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Nome da Categoria!</div>';
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
    <title>Nova Categoria</title>
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
                        <h2>Cadastrar Categoria</h2>
                        <h5>Aqui você podera Cadastrar todas as suas Categorias!</h5>
                    </div>
                </div>
                <hr />
                <form action="nova_categoria.php" method="post">
                    <div class="form-group">
                        <label>Nome da Categoria:</label>
                        <input class="form-control"
                            placeholder="Digite o Nome da Categoria, Exemplo: Conta de Internet..." name="nomeCategoria"
                            id="nomeCategoria" value="<?= isset($nome) ? $nome : '' ?>" />
                    </div>
                    <button class="btn btn-success" onclick="return ValidarCategoria()" name="btnSalvar">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
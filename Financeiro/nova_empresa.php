<?php

    require_once '../DAO/EmpresaDAO.php';
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    if(isset($_POST['btnGravar'])){
        $nome = trim($_POST['nomeEmpresa']);
        $telefone = trim($_POST['tfEmpresa']);
        $endereco = trim($_POST['enderecoEmpresa']);

        $objDAO = new EmpresaDAO();
        $ret = $objDAO->CadastrarEmpresa($nome,$telefone,$endereco);

        if($ret == -1){
            $msg = '<div class="alert alert-warning">
            Preencha o campo Nome da Empresa! </div>';
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
    <title>Nova Empresa</title>
    <?php include_once '_head.php'?>
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
                        <h2>Cadastrar Empresa</h2>
                        <h5>Aqui você podera Cadastrar todos os nomes das Empresas.</h5>
                    </div>
                </div>
                <hr />
                <form action="nova_empresa.php" method="post">
                    <div class="form-group">
                        <label>Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o Nome da Empresa, Exemplo: Casas Bahia..." name="nomeEmpresa" id="nomeEmpresa" value="<?= isset($nome) ? $nome : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Telefone/Whatsapp:</label>
                        <input class="form-control" placeholder="Digite o Telefone/Whatsapp da Empresa (Opcional!)" name="tfEmpresa" id="tfEmpresa" value="<?= isset($telefone) ? $telefone : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input class="form-control" placeholder="Digite o Endereço da Empresa (Opcional!)" name="enderecoEmpresa" id="enderecoEmpresa" value="<?= isset($endereco) ? $endereco : '' ?>"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarEmpresa()" name="btnGravar">Gravar</button>
                </form>           
            </div>
        </div>
    </div>
</body>
</html>
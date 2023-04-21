<?php

    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    require_once '../DAO/EmpresaDAO.php';

    $dao = new EmpresaDAO();
    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
        $idEmpresa = $_GET['cod'];
        $dados = $dao->DetalharEmpresa($idEmpresa);

        if (count($dados) == 0) {
            header('location: consultar_empresa.php');
            exit;
        }

    }
    elseif(isset($_POST['btnSalvar'])){
        $idEmpresa = $_POST['cod'];
        $nome_empresa = $_POST['nomeEmpresa'];
        $telefone_empresa = $_POST['telefone_empresa'];
        $endereco_empresa = $_POST['enderecoEmpresa'];

        $ret = $dao->AlterarEmpresa($idEmpresa,$nome_empresa,$telefone_empresa,$endereco_empresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    }
    elseif(isset($_POST['btnExcluir'])){
        $idEmpresa = $_POST['cod'];

        $ret = $dao->ExcluirEmpresa($idEmpresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Alterar | Excluir Empresa</title>
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
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você podera AlTERAR ou EXCLUIR suas Empresas.</h5>
                    </div>
                </div>
                <hr />
                <form action="alterar_empresa.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>" >
                    <div class="form-group">
                        <label>Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o Nome da Empresa..." name="nomeEmpresa" id="nomeEmpresa" value="<?= $dados[0]['nome_empresa'] ?>" maxlength="40"/>
                    </div>
                    <div class="form-group">
                        <label>Telefone/Whatsapp:</label>
                        <input class="form-control" placeholder="Digite o Telefone/Whatsapp..." name="telefone_empresa" id="telefone_empresa" value="<?= $dados[0]['telefone_empresa'] ?>" maxlength="12"/>
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input class="form-control" placeholder="Digite o Endereço da Empresa..." name="enderecoEmpresa" id="enderecoEmpresa" value="<?= $dados[0]['endereco_empresa'] ?>" maxlength="40"/>
                    </div>
                    <button class="btn btn-success" onclick="return ValidarEmpresa()" name="btnSalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Comfirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a empresa: <b><?= $dados[0]['nome_empresa'] ?>?</span></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
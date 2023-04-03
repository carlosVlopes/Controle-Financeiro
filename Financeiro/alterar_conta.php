<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Alterar | Excluir Contas</title>
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você podera AlTERAR ou EXCLUIR suas Contas Bancárias!</h5>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label>Nome do Banco:</label>
                    <input class="form-control" placeholder="Digite o Nome do Banco..." name="nomeBanco" id="nomeBanco" value=""/>
                </div>
                <div class="form-group">
                    <label>Agência:</label>
                    <input class="form-control" placeholder="Digite a Agência..." name="agencia" id="agencia" value=""/>
                </div>
                <div class="form-group">
                    <label>Número da Conta:</label>
                    <input class="form-control" placeholder="Digite o Número da Conta..." name="numeroConta" id="numeroConta" value=""/>
                </div>
                <div class="form-group">
                    <label>Saldo:</label>
                    <input class="form-control" placeholder="Digite o Saldo da Conta..." name="saldoConta" id="saldoConta" value=""/>
                </div>
                <button class="btn btn-success" onclick="return ValidarConta()" name="btnGravar">Salvar</button>
                <button class="btn btn-danger" name="btnExcluir">Excluir</button>
            </div>
        </div>
    </div>
</body>
</html>
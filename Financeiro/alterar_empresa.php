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
                <div class="form-group">
                    <label>Nome da Empresa:</label>
                    <input class="form-control" placeholder="Digite o Nome da Empresa..." name="nomeEmpresa" id="nomeEmpresa" value=""/>
                </div>
                <div class="form-group">
                    <label>Telefone/Whatsapp:</label>
                    <input class="form-control" placeholder="Digite o Telefone/Whatsapp..." name="tfEmpresa" id="tfEmpresa" value=""/>
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input class="form-control" placeholder="Digite o Endereço da Empresa..." name="enderecoEmpresa" id="enderecoEmpresa" value=""/>
                </div>
                <button class="btn btn-success" onclick="return ValidarEmpresa()" name="btnSalvar">Salvar</button>
                <button class="btn btn-danger" name="btnExcluir">Excluir</button>
            </div>
        </div>
    </div>
</body>
</html>
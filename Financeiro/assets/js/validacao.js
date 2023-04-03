function ValidarMeusDados(){
    var nome = $("#nomeUsuario").val();
    var email = $("#emailUsuario").val();

    if(nome.trim() == ''){
        alert("Preencher o campo Nome!");
        $("#nomeUsuario").focus();
        return false;
    }
    if(email.trim() == ''){
        alert("Preencher o campo Email!");
        $("#emailUsuario").focus();
        return false;
    }
}

function ValidarCategoria(){

    if($("#nomeCategoria").val().trim() == ''){
        alert("Preencher o campo NOME CATEGORIA!");
        $("#nomeCategoria").focus();
        return false;
    }
}

function ValidarEmpresa(){
    if($("#nomeEmpresa").val().trim() == ''){
        alert("Preencher o campo NOME EMPRESA!");
        $("#nomeEmpresa").focus();
        return false;
    }   
}

function ValidarConta(){
    if($("#nomeBanco").val().trim() == ''){
        alert("Preencher o campo Nome Banco!");
        $("#nomeBanco").focus();
        return false;
    }  
    if($("#agencia").val().trim() == ''){
        alert("Preencher o campo Agência!");
        $("#agencia").focus();
        return false;
    }  
    if($("#numeroConta").val().trim() == ''){
        alert("Preencher o campo Número da Conta!");
        $("#numeroConta").focus();
        return false;
    }  
    if($("#saldoConta").val().trim() == ''){
        alert("Preencher o campo Saldo!");
        $("#saldoConta").focus();
        return false;
    }  
}

function ValidarMovimento(){
    if($("#tipo").val().trim() == ''){
        alert("Preencher o campo Tipo de Movimento!");
        $("#tipo").focus();
        return false;
    }  
    if($("#data").val().trim() == ''){
        alert("Preencher o campo Data!");
        $("#data").focus();
        return false;
    }  
    if($("#valor").val().trim() == ''){
        alert("Preencher o campo Valor!");
        $("#valor").focus();
        return false;
    }  
    if($("#categoria").val().trim() == ''){
        alert("Preencher o campo Categoria!");
        $("#categoria").focus();
        return false;
    }  
    if($("#empresa").val().trim() == ''){
        alert("Preencher o campo Empresa!");
        $("#empresa").focus();
        return false;
    }  
    if($("#conta").val().trim() == ''){
        alert("Preencher o campo Conta!");
        $("#conta").focus();
        return false;
    }  
}

function ValidarConsultaPeriodo(){
    if($("#tipo").val().trim() == ''){
        alert("Preencher o campo Tipo de Movimento!");
        $("#tipo").focus();
        return false;
    }  
    if($("#dataInicial").val().trim() == ''){
        alert("Preencher o campo Data Inicial!");
        $("#dataInicial").focus();
        return false;
    }  
    if($("#dataFinal").val().trim() == ''){
        alert("Preencher o campo Data Final!");
        $("#dataFinal").focus();
        return false;
    } 
}

function ValidarLogin(){
    if($("#emailusuario").val().trim() == ''){
        alert("Preencher o campo Email!");
        $("#emailusuario").focus();
        return false;
    }  
    if($("#senhaUsuario").val().trim() == ''){
        alert("Preencher o campo Senha!");
        $("#senhaUsuario").focus();
        return false;
    }  
}

function ValidarCadastro(){
    if($("#nomeUsuario").val().trim() == ''){
        alert("Preencher o campo Nome!");
        $("#nomeUsuario").focus();
        return false;
    }  
    if($("#emailUsuario").val().trim() == ''){
        alert("Preencher o campo Email!");
        $("#emailUsuario").focus();
        return false;
    }  
    if($("#senha").val().trim() == ''){
        alert("Preencher o campo Senha!");
        $("#senha").focus();
        return false;
    }  
    if($("#senha").val().trim().length < 6){
        alert("A senha deverá conter no mínimo 6 caracteres!");
        $("#senha").focus();
        return false;
    }  
    if($("#senha").val().trim() != $("#rSenha").val().trim()){
        alert("O campo Senha e o campo Repitir Senha deverão ser iguais");
        $("#rSenha").focus();
        return false;
    }  
}
select nome_usuario, data_cadastro
	from tb_usuario
    where nome_usuario like '%c%';
    
select nome_usuario, data_cadastro
	from tb_usuario
	where data_cadastro between '2023-03-09' and '2023-08-29';
    
select banco_conta,agencia_conta,saldo_conta
	from tb_conta
    where id_usuario = 1;
    
    
    
    
    
-- atividade aula 19

select id_movimento,
       tipo_movimento,
       date_format(data_movimento, "%d/%m/%Y") as data_movimento,
       valor_movimento,
       nome_usuario,
       obs_movimento
       from tb_movimento
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_movimento.id_usuario
	where tipo_movimento = 1
    and data_movimento between '2023-01-01' and '2023-08-30'
    and nome_usuario like '%a%';
    
select id_movimento,
       tipo_movimento,
       date_format(data_movimento, "%d/%m/%Y") as data_movimento,
       valor_movimento,
       nome_usuario,
       obs_movimento
       from tb_movimento
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_movimento.id_usuario
	where tipo_movimento = 2
    and data_movimento between '2023-01-01' and '2023-08-30'
    and nome_usuario like '%d%';
    
select id_usuario,
	   nome_usuario,
       email_usuario,
       senha_usuario,
       date_format(data_cadastro, "%d/%m/%Y") as data_cadastro
       from tb_usuario
	where data_cadastro between '2023-01-01' and '2023-10-30';
    
select nome_usuario,
	   nome_categoria
       from tb_categoria
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_categoria.id_usuario;
        
select nome_usuario,
	   email_usuario,
       banco_conta,
       saldo_conta,
       numero_conta
       from tb_conta
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_conta.id_usuario;
	   
select nome_categoria,
	   nome_empresa,
       nome_usuario,
       data_movimento,
       valor_movimento,
       tipo_movimento
       from tb_movimento
	inner join tb_categoria
		on tb_categoria.id_categoria = tb_movimento.id_categoria
	inner join tb_empresa
		on tb_empresa.id_empresa = tb_movimento.id_empresa
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_movimento.id_usuario;
        
        
select nome_categoria,
	   banco_conta,
       agencia_conta,
       numero_conta,
       saldo_conta,
	   nome_empresa,
       telefone_empresa,
       endereco_empresa,
       nome_usuario,
       email_usuario,
       senha_usuario,
       date_format(data_cadastro, "%d/%m/%Y") as data_cadastro,
       date_format(data_movimento, "%d/%m/%Y") as data_movimento,
       valor_movimento,
       tipo_movimento,
       obs_movimento
       from tb_movimento
	inner join tb_categoria
		on tb_categoria.id_categoria = tb_movimento.id_categoria
	inner join tb_empresa
		on tb_empresa.id_empresa = tb_movimento.id_empresa
	inner join tb_usuario
		on tb_usuario.id_usuario = tb_movimento.id_usuario
    inner join tb_conta
		on tb_conta.id_conta = tb_movimento.id_conta;    
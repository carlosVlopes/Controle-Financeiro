select nome_categoria, nome_usuario
	from tb_categoria
inner join tb_usuario
	on tb_categoria.id_usuario = tb_usuario.id_usuario;
    
    select tipo_movimento,
			date_format(data_movimento, "%d/%m/%Y") as data_movimento,
            valor_movimento,
            nome_categoria,
            nome_empresa,
            nome_usuario,
            banco_conta
		from tb_movimento
inner join tb_categoria
		on tb_categoria.id_categoria = tb_movimento.id_categoria
inner join tb_empresa
		on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_usuario
		on tb_usuario.id_usuario = tb_movimento.id_usuario
inner join tb_conta
		on tb_conta.id_conta = tb_movimento.id_conta
	where tb_movimento.tipo_movimento = 2
    and tb_movimento.valor_movimento > 1000;
    
select sum(valor_movimento) as total
	from tb_movimento
    where tipo_movimento = 1
    and id_usuario = 1;
	
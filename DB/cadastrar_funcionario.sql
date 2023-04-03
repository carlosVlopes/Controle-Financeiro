-- cadastrar funcionarios

insert into tb_adm
(nome_adm,email_adm,senha_adm,data_cadastro)
values
('adm', 'adm@1234', '1234567', '2023-05-23');

insert into tb_cargos
(nome_cargos,descricao_cargos,id_adm)
values
('funcionario', 'descricao Cargo', 1);

insert into tb_cargos
(nome_cargos,descricao_cargos,id_adm)
values
('entregador', 'descricao Cargo', 1);

insert into tb_cargos
(nome_cargos,descricao_cargos,id_adm)
values
('caixa', 'descricao Cargo', 1);

insert into tb_funcionarios
(nome_funcionario,dataAdmissao_funcionario,dataDemissao_funcionario,id_adm,id_cargos)
values
('carlos','2022-05-24', '2023-10-20', 1, 1);

insert into tb_funcionarios
(nome_funcionario,dataAdmissao_funcionario,dataDemissao_funcionario,id_adm,id_cargos)
values
('joao','2022-05-24', '2023-10-20', 1, 1);

insert into tb_funcionarios
(nome_funcionario,dataAdmissao_funcionario,dataDemissao_funcionario,id_adm,id_cargos)
values
('daniel','2022-05-24', '2023-10-20', 1, 1);

insert into tb_funcionarios
(nome_funcionario,dataAdmissao_funcionario,dataDemissao_funcionario,id_adm,id_cargos)
values
('ana','2022-05-24', '2023-10-20', 1, 1);

-- cadastro clientes / funcionario 4

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente1', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 4);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente2', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 4);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente3', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 4);

-- cadastro clientes / funcionario 5

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente1', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 5);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente2', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 5);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente3', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 5);


-- cadastro clientes / funcionario 6

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente1', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 6);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente2', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 6);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente3', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 6);

-- cadastro clientes / funcionario 7

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente1', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 7);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente2', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 7);

insert into tb_clientes
(nome_cliente,rua_cliente,bairro_cliente,cep_cliente,cidade_cliente,estado_cliente,dataNascimento_cliente,obs_cliente,id_adm,id_funcionarios)
values
('cliente3', 'rua taaa', 'bairro', '86043190', 'londrina', 'parana', '2005-10-27', 'obs', 1, 7);

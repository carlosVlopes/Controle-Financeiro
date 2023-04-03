<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';
    class EmpresaDAO extends Conexao{

        public function CadastrarEmpresa($nome,$telefone,$endereço){
            if($nome == ''){
                return -1;
            }
            $conexao = parent::retornarConexao();

            $comando_sql = 'insert into tb_empresa(nome_empresa,telefone_empresa,endereco_empresa,id_usuario)
            values
            (?, ?, ?, ?);';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1,$nome);
            $sql->bindValue(2,$telefone);
            $sql->bindValue(3,$endereço);
            $sql->bindValue(4, UtilDAO::CodigoLogado());

            try{
                $sql->execute();
                return 1;
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                return 0;
            }

        }
    }
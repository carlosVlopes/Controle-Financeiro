<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class ContaDAO extends Conexao{

        public function CadastrarConta($banco,$agencia,$numero,$saldo){
            if($banco == ''){
                return -1;
            }
            elseif($agencia == ''){
                return -2;
            }
            elseif($numero == ''){
                return -3;
            }
            elseif($saldo == ''){
                return -4;
            }

            $conexao = parent::retornarConexao();

            $comando_sql = 'insert into tb_conta(banco_conta,agencia_conta,numero_conta,saldo_conta,id_usuario)
            values
            (?, ?, ?, ?, ?);';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1,$banco);
            $sql->bindValue(2,$agencia);
            $sql->bindValue(3,$numero);
            $sql->bindValue(4,$saldo);
            $sql->bindValue(5, UtilDAO::CodigoLogado());

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
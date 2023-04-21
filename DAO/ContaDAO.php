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
            }else{
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

        public function ConsultarConta(){
            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_conta,
                                   banco_conta,
                                   agencia_conta,
                                   numero_conta,
                                   saldo_conta
                                from tb_conta
                                where id_usuario = ? order by banco_conta ASC';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);      
            $sql->bindValue(1,UtilDAO::CodigoLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function DetalharConta($idConta){
            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_conta,
                                   banco_conta,
                                   agencia_conta,
                                   numero_conta,
                                   saldo_conta
                                from tb_conta
                                where id_conta = ?
                                and id_usuario = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);  
            $sql->bindValue(1,$idConta); 
            $sql->bindValue(2,UtilDAO::CodigoLogado()); 

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function AlterarConta($idConta, $banco, $numero, $agencia, $saldo){
            if(trim($banco) == '' || trim($numero) == '' || trim($agencia) == '' || trim($saldo) == '' || trim($idConta) == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'update tb_conta
                                    set banco_conta = ?,
                                        numero_conta = ?,
                                        agencia_conta = ?,
                                        saldo_conta = ?
                                    where id_conta = ?
                                    and id_usuario = ?';
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);  
                $sql->bindValue(1,$banco);
                $sql->bindValue(2,$numero);
                $sql->bindValue(3,$agencia);
                $sql->bindValue(4,$saldo);
                $sql->bindValue(5,$idConta);
                $sql->bindValue(6,UtilDAO::CodigoLogado());
    
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

        public function ExcluirConta($idConta){
            if($idConta == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'delete
                                    from tb_conta
                                where id_conta = ?
                                and id_usuario =?';
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$idConta);
                $sql->bindValue(2,UtilDAO::CodigoLogado());
    
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
    }

?>
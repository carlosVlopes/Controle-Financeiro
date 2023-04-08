<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';
    class EmpresaDAO extends Conexao{

        public function CadastrarEmpresa($nome,$telefone,$endereço){
            if($nome == ''){
                return -1;
            }else{
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

        public function ConsultarEmpresa(){
            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_empresa,
                                   nome_empresa,
                                   telefone_empresa,
                                   endereco_empresa
                                from tb_empresa
                                where id_usuario = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, UtilDAO::CodigoLogado());
            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function DetalharEmpresa($idEmpresa){
            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_empresa,
                                   nome_empresa,
                                   telefone_empresa,
                                   endereco_empresa
                                from tb_empresa
                                where id_empresa = ?
                                and id_usuario = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1,$idEmpresa);
            $sql->bindValue(2,UtilDAO::CodigoLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function AlterarEmpresa($idEmpresa,$nome_empresa,$telefone_empresa,$endereco_empresa){
            if (trim($nome_empresa) == '' || $idEmpresa == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'update tb_empresa
                                    set nome_empresa = ?,
                                        telefone_empresa = ?,
                                        endereco_empresa = ?
                                    where id_empresa = ?
                                        and id_usuario = ?';
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1, $nome_empresa);
                $sql->bindValue(2, $telefone_empresa);
                $sql->bindValue(3, $endereco_empresa);
                $sql->bindValue(4, $idEmpresa);
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

        public function ExcluirEmpresa($idEmpresa){
            if($idEmpresa == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'delete 
                                    from tb_empresa
                                where id_empresa = ?
                                and id_usuario = ?';
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$idEmpresa);
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
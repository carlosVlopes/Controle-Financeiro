<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';


    class MovimentoDAO extends Conexao
    {

        public function RealizarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta , $obs){

            if($tipo == '' || $data == '' || trim($valor) == '' || $categoria == '' || $empresa == '' || $conta == ''){
                return 0;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'insert into tb_movimento (tipo_movimento,data_movimento,valor_movimento,obs_movimento,id_categoria,id_empresa,id_conta, id_usuario)
                            values(?,?,?,?,?,?,?,?)';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $tipo);
            $sql->bindValue(2, $data);
            $sql->bindValue(3, $valor);
            $sql->bindValue(4, $obs);
            $sql->bindValue(5, $categoria);
            $sql->bindValue(6, $empresa);
            $sql->bindValue(7, $conta);
            $sql->bindValue(8, UtilDAO::CodigoLogado());

            // inicio da transaction
            $conexao->beginTransaction();

            try{
                // execute para inserir na tb_movimento
                $sql->execute();

                if($tipo == 1){
                    $comando_sql = 'update tb_conta
                                        set saldo_conta = saldo_conta + ?
                                    where id_conta = ?';
                }elseif($tipo == 2){
                    $comando_sql = 'update tb_conta
                                        set saldo_conta = saldo_conta - ?
                                    where id_conta = ?';
                }
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$valor);
                $sql->bindValue(2,$conta);

                // execute para modificar o saldo da conta
                $sql->execute();
                // fim da transaction se tiver tudo certo
                $conexao->commit();
                return 1;
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                //caso acontecer um erro na transaction
                $conexao->rollBack();
                return 0;
            }


        }

        public function ConsultarMovimento($tipo, $dataInicial, $dataFinal){

            if ($dataInicial == '') {
                return -1;
            } elseif ($dataFinal == '') {
                return -2;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'select tipo_movimento,
                            date_format(data_movimento, "%d/%m/%Y") as data_movimento,
                            valor_movimento,
                            obs_movimento,
                            id_movimento,
                            nome_categoria,
                            nome_empresa,
                            banco_conta,
                            numero_conta,
                            agencia_conta,
                            tb_movimento.id_conta
                        from tb_movimento
                inner join tb_categoria
                        on tb_categoria.id_categoria = tb_movimento.id_categoria
                inner join tb_empresa
                        on tb_empresa.id_empresa = tb_movimento.id_empresa
                inner join tb_conta
                        on tb_conta.id_conta = tb_movimento.id_conta
                    where tb_movimento.id_usuario = ?
                        and tb_movimento.data_movimento between ? and ?';
            if($tipo != 0){
                $comando_sql = $comando_sql . 'and tipo_movimento = ?';
            }

            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, UtilDAO::CodigoLogado());
            $sql->bindValue(2, $dataInicial);
            $sql->bindValue(3, $dataFinal);

            if($tipo != 0){
                $sql->bindValue(4,$tipo);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        }

        public function ExcluirMovimento($idMovimento, $idConta, $valor,$tipo){
            if($idMovimento == '' || $idConta == '' || $valor == '' || $tipo == ''){
                return 0;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'delete from tb_movimento
                                where id_movimento = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1,$idMovimento);

            $conexao->beginTransaction();
            try{
                //deleta o movimento
                $sql->execute();
                if($tipo == 1){
                    $comando_sql = 'update tb_conta set saldo_conta = saldo_conta - ?
                                    where id_conta = ?';
                }elseif($tipo == 2){
                    $comando_sql = 'update tb_conta set saldo_conta = saldo_conta + ?
                                    where id_conta = ?';
                }

                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$valor);
                $sql->bindValue(2,$idConta);

                //atualiza o saldo da conta
                $sql->execute();
                $conexao->commit();
                return 1;
            }catch(Exception $ex){
                $conexao->rollBack();
                echo $ex->getMessage();
                return 0;
            }
        }
    }

?>
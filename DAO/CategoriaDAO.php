
<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class CategoriaDAO extends Conexao{

        public function CadastrarCategoria($nome){
            if($nome == ''){
                return -1;
            }

            $conexao = parent::retornarConexao();

            $comando_sql = 'insert into tb_categoria(nome_categoria,id_usuario)
                            values(?, ?);';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1,$nome);
            $sql->bindValue(2, UtilDAO::CodigoLogado());

            try{
                $sql->execute();
                return 1;
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                return 0;
            }

        }

        public function ConsultarCategoria(){
            
        }
        public function DetalharCategoria($idCategoria){

        }
        public function AlterarCategoria(){

        }
        public function ExcluirCategoria($idCategoria){

        }
    }
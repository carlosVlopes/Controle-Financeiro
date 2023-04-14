<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class UsuarioDAO extends Conexao
    {

        public function CarregarMeusDados()
        {

            $conexao = parent::retornarConexao();

            $comando_sql = 'select nome_usuario,email_usuario
                                from tb_usuario
                                where id_usuario = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);


            $sql->bindValue(1, UtilDAO::CodigoLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function GravarMeusDados($nome, $email)
        {
            if ($nome == '') {
                return -1;
            } elseif ($email == '') {
                return -2;
            } elseif($this->VerificarEmaiAlteracao($email) != 0){
                return -3;
            } else {
                // continuar codigo da funcao
                $conexao = parent::retornarConexao();

                $comando_sql = 'update tb_usuario
                                        set nome_usuario = ?,
                                            email_usuario = ?
                                        where id_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);


                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, UtilDAO::CodigoLogado());

                try {
                    $sql->execute();
                    return 1;
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    return 0;
                }
            }
        }

        public function ValidarLogin($email, $senha)
        {
            if ($email == '') {
                return -1;
            } elseif ($senha == '') {
                return -2;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_usuario, nome_usuario
                            from tb_usuario
                            where email_usuario = ?
                            and senha_usuario = ?;';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1,$email);
            $sql->bindValue(2,$senha);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $user = $sql->fetchAll();
            if(count($user) == 0){
                return -3;
            }else{
                $cod = $user[0]['id_usuario'];
                $nome = $user[0]['nome_usuario'];
                UtilDAO::CriarSessao($cod,$nome);
                header('location: meus_dados.php');
                exit;
            }
        }

        public function VerificarEmailDuplicado($email){
            if(trim($email) == ''){
                return 0;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'select count(email_usuario) as contar from tb_usuario
                            where email_usuario = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1,$email);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $contar = $sql->fetchAll();
            return $contar[0]['contar'];
        }
        public function VerificarEmaiAlteracao($email){
            if(trim($email) == ''){
                return 0;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'select count(email_usuario) as contar from tb_usuario
                            where email_usuario = ?
                            and id_usuario != ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1,$email);
            $sql->bindValue(2, UtilDAO::CodigoLogado());
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $contar = $sql->fetchAll();
            return $contar[0]['contar'];
        }

        public function CriarCadastro($nome, $email, $senha, $rsenha)
        {
            if ($nome == '') {
                return -1;
            } elseif ($email == '') {
                return -2;
            } elseif ($senha == '') {
                return -3;
            } elseif ($rsenha == '') {
                return -4;
            } elseif (strlen($senha) < 6) {
                return -5;
            } elseif ($senha != $rsenha) {
                return -6;
            } elseif($this->VerificarEmailDuplicado($email) != 0){
                return -7;
            } else {
                $conexao = parent::retornarConexao();

                $comando_sql = 'insert into tb_usuario(nome_usuario,email_usuario,senha_usuario,data_cadastro)
                    values
                    (?, ?, ?, ?);';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $senha);
                $sql->bindValue(4, UtilDAO::DataCadastro());

                try {
                    $sql->execute();
                    return 1;
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    return 0;
                }
            }
        }
    }

?>
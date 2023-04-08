<?php

    class MovimentoDAO
    {

        public function RealizarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta)
        {
            if ($tipo == '') {
                return -1;
            } elseif ($data == '') {
                return -2;
            } elseif ($valor == '') {
                return -3;
            } elseif ($categoria == '') {
                return -4;
            } elseif ($empresa == '') {
                return -5;
            } elseif ($conta == '') {
                return -6;
            }
        }

        public function ConsultarMovimento($tipo, $dataInicial, $dataFinal)
        {
            if ($tipo == '') {
                return -1;
            } elseif ($dataInicial == '') {
                return -2;
            } elseif ($dataFinal == '') {
                return -3;
            }
        }

        public function ExcluirMovimento()
        {

        }
    }

?>
<?php

    class UtilDAO{

        public static function CodigoLogado(){
            return 1;
        }
        public static function DataCadastro(){
            $data = date('Y/m/d'); 
            return $data;
        }
    }
<?php
    include_once('C:/xampp/htdocs/ProjetoTCC/config.php');
    /**
     * Class painel
     */
    class Banco 
    {
        private static $banco_dados;
        public static function conectar()
        {
            if(self::$banco_dados == NULL)
            {
                #Use esse o comando try e catch para o tratamento de execessão e evitar que o php mostre o código da senha.
                try {
                    self::$banco_dados = new PDO('mysql:host=' .HOST. ';dbname=' .DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    #Habilita o modo de mostrar erros toda vez que iniciar executa o sql->execute();
                    self::$banco_dados->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo '<h2>erro ao conectar</h2>';
                }
            } 
            return self::$banco_dados;       
        }
    }
    

?>
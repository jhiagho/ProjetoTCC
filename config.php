<?php
define('INCLUDE_PATH','http://localhost/ProjetoTCC');
date_default_timezone_set('America/Sao_Paulo'); // Define a data do sistema.

session_start(); // inicializar a session.


//definição do banco de dados.
define('HOST','localhost'); // Nome do Host do banco
define('USER','root'); // Nome do User do Banco. padrao: root
define('PASSWORD',''); //Nome do Password do Banco. padrao: ' ' <-- vazio -->
define('DATABASE','projeto_tcc'); // Nome do banco de Dados a ser utilizado

//Criar a classe de forma automatica sem precisar de instanciar a classe.
$autoload = function($class){
    if($class == 'Email')
    {
        require_once 'vendor/autoload.php';
    }
    include('classes/'.$class.'.php');
};

    spl_autoload_register($autoload);
?>
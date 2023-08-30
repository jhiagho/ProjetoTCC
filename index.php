<?php 
// include('config.php');
include('classes/painel.php');

if (painel::logado() == false){
    include('paginas/login.php');
} else {
    include('paginas/main.php');
}

?>
<?php 
include('classes/painel.php');

if(isset($_POST['cadastro']))
{
    $_SESSION['cadastro'] = false;
    header('Location: '.INCLUDE_PATH.'/paginas/cadastro.php');
}

if (painel::logado() == false){
    include('paginas/login.php');
} else {
    include('paginas/main.php');
}

?>
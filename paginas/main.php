<h1>Pagina Main bem vindo</h1>
<?php 
    if (isset($_GET['loggout'])) {
        Painel::loggout();
    }
    echo $_SESSION['usuario']. '<hr>';
    echo $_SESSION['senha']. '<hr>';
    echo $_SESSION['permissao']. '<hr>';
    echo $_SESSION['setor']. '<hr>';
            ?>
<h1>Voltar para pagina de login</h1><a href=""></a>
<a href="<?php echo INCLUDE_PATH ?>/?loggout"> <i class="fa-solid fa-right-from-bracket"><span>Sair</span></i></a>
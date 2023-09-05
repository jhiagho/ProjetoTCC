<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://localhost/ProjetoTCC/css/painel.css">
    </head>
    <body>

        <aside>

        </aside>

        <?php 
            if (isset($_GET['loggout'])) {
                Painel::loggout();
            }
            echo $_SESSION['usuario']. '<hr>';
            echo $_SESSION['permissao']. '<hr>';
            echo $_SESSION['setor']. '<hr>';

        ?>
        <h1>Voltar para pagina de login</h1><a href=""></a>
        <a href="<?php echo INCLUDE_PATH ?>/?loggout"> <i class="fa-solid fa-right-from-bracket"><span>Sair</span></i></a>

    </body>
</html>


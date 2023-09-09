<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://localhost/ProjetoTCC/css/painel.css">
        <link rel="stylesheet" href="http://localhost/ProjetoTCC/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../">
    </head>
   
    <body>
    <article class="menu-principal" >
                  
            <aside class="side-bar">
                <section class="container-image">
                    <i class="fa-solid fa-user"></i>
                </section><!--container-image-->

                <section class="subtitulo-img">
                    <h1> <?php echo $_SESSION['usuario']; ?></h1>
                    <h1> <?php echo $_SESSION['permissao']; ?></h1>
                </section>

                <ul class="opcoes-menus">
                    <li>
                        <img src="./painel/imagens/editar-cadastro.png">
                        <a href="#">Editar Usuario</a>
                    </li>

                    <li>
                        <img src="./painel/imagens/meu-chamados_2.png">
                        <a href="#">Meus chamados</a>
                    </li>

                    <li>
                        <img src="./painel/imagens/chamados.png">
                        <a href="#">Chamados</a>
                    </li>
                    <li>
                        <img src="./painel/imagens/base-conhecimento.png">
                        <a href="#">Base de conhecimento</a>
                    </li>

                    <li>
                        <img src="./painel/imagens/Sair.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?loggout">Sair</a>
                    </li>
                </ul>
                
            </aside><!--menu-lateral-->

            <section class="conteudo">

                <h2>Testes</h2>
                <?php 
                if (isset($_GET['loggout'])) {
                    Painel::loggout();
                }
                echo $_SESSION['usuario']. '<hr>';
                echo $_SESSION['permissao']. '<hr>';
                echo $_SESSION['setor']. '<hr>';

                ?>
            </section>
        </article>

    </body>
</html>


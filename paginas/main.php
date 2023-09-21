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
        
    </head>
   
    <body>
        <div id="overlay" onclick="toggleDrawer()"></div>
        
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
                    <li id="linha_menu_1">
                        <img src="./painel/imagens/editar-cadastro.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?editar_usuario">Editar Usuario</a>
                    </li>

                    <li id="linha_menu_2">
                        <img src="./painel/imagens/meu-chamados_2.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?meus_chamados">Meus chamados</a>
                    </li>

                    <li id="linha_menu_3">
                        <img src="./painel/imagens/chamados.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?hub_chamados">Chamados</a>
                    </li>
                    <li id="linha_menu_4">
                        <img src="./painel/imagens/base-conhecimento.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?base_conhecimento">Base de conhecimento</a>
                    </li>

                    <li id="linha_menu_5">
                        <img src="./painel/imagens/Sair.png">
                        <a href="<?php echo INCLUDE_PATH ?>/?loggout">Sair</a>
                            <?php 
                                if (isset($_GET['loggout'])) {
                                    Painel::loggout();
                                }
                            ?>
                    </li>
                </ul>
                
            </aside><!--menu-lateral-->

            <section class="conteudo">
                <?php
                    if (isset($_GET['hub_chamados'])) {
                        include("./painel/paginas/hub_chamados.php");
                    }

                    else if (isset($_GET['meus_chamados'])) {
                        include("./painel/paginas/meus_chamados.php");
                    }

                    else if (isset($_GET['editar_usuario'])){
                        include("./painel/paginas/editar_usuario.php");
                    }

                    else if (isset($_GET['base_conhecimento']))
                    {
                        include("./painel/paginas/base_conhecimento.php");
                    }

                    else {
                        include("./painel/paginas/meus_chamados.php");
                    }
                ?>
            </section>
        </article>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="http://localhost/ProjetoTCC/painel/painel_js/painel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    </body>
</html>


<?php
    include_once('/xampp/htdocs/ProjetoTCC/classes/painel.php');
    $id_usuario = $_SESSION['Usuario_ID'];
    global $usuario;
    $banco = Banco::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE `id` = '$id_usuario' ");
    $banco->execute();
    $usuario = $banco->fetch(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>/fontawesome/css/all.min.css">
        
    </head>
   
    <body>
        <div id="overlay" onclick="toggleDrawer()"></div>
 
    <article class="menu-principal" >
            <aside class="side-bar">
                <section class="container-image">
                    <i class="fa-solid fa-user"></i>
                </section><!--container-image-->

                <section class="subtitulo-img">
                    <h1> <i class="fa-regular fa-user"></i> <?php echo $usuario['usuario']; ?> </h1>
                    <h1> <i class="fa-solid fa-key"></i> <?php echo painel::nome_permissao($usuario['id_nivel_perm']); ?> </h1>
                    <h1> <i class="fa-regular fa-compass"></i> <?php echo painel::buscar_nome_setor($usuario['usuario']);?> </h1>
                </section>

                <ul class="opcoes-menus">
                    <!-- <li id="linha_menu"> -->

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="fa-solid fa-gear"></i> Administração
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                               <ul class="admin_menu">
                                    <li> <a href="<?php echo INCLUDE_PATH ?>/?editar_usuario=<?php echo $_SESSION['Usuario_ID'];?>"> <i class="fa-solid fa-user-pen"></i> Editar Usuario</a> </li>
                                    <li> <a href="<?php echo INCLUDE_PATH ?>/?listar_usuario"> <i class="fa-solid fa-users"></i> Listar Usuario</a> </li>
                                    <li> <a href="<?php echo INCLUDE_PATH ?>/?adicionar_setor"> <i class="fa-regular fa-square-plus"></i> Adicionar Setor</a> </li>
                                    <li> <a href="<?php echo INCLUDE_PATH ?>/?listar_setor"> <i class="fa-solid fa-table-list"></i> Listar Setor</a> </li>
                               </ul>
                            </div>
                        </div>
                    </div>

                    <!-- </li> -->

                    <li id="linha_menu_2">
                        <img src="./painel/imagens/meu-chamados-3.svg">
                        <a href="<?php echo INCLUDE_PATH ?>/?meus_chamados">Meus chamados</a>
                    </li>

                    <li id="linha_menu_3">
                        <img src="./painel/imagens/chamados-2.svg">
                        <a href="<?php echo INCLUDE_PATH ?>/?hub_chamados">Chamados</a>
                    </li>
                    <li id="linha_menu_4">
                        <img src="./painel/imagens/base-conhecimento-2.svg">
                        <a href="<?php echo INCLUDE_PATH ?>/?base_conhecimento">Base de conhecimento</a>
                    </li>

                    <li id="linha_menu_5">
                        <img src="./painel/imagens/sair-2.svg">
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
                        include("./painel/paginas/paginas_painel/hub_chamados.php");
                    }

                    else if (isset($_GET['meus_chamados'])) {
                        include("./painel/paginas/paginas_painel/meus_chamados.php");
                    }

                    else if (isset($_GET['base_conhecimento']))
                    {
                        include("./painel/paginas/paginas_painel/base_conhecimento.php");
                    }


                    else if (isset($_GET['editar_usuario'])){
                        include("./painel/paginas/paginas_painel_admin/editar_usuario.php");
                    }

                    else if (isset($_GET['listar_usuario'])){
                        include("./painel/paginas/paginas_painel_admin/listar_usuario.php");
                    }

                    else if (isset($_GET['listar_setor'])){
                        include("./painel/paginas/paginas_painel_admin/editar_setor.php");
                    }

                    else if (isset($_GET['adicionar_setor'])){
                        include("./painel/paginas/paginas_painel_admin/adicionar_setor.php");
                    }

                    else {
                        include("./painel/paginas/paginas_painel/meus_chamados.php");
                    }
                ?>
            </section>
            
        </article>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>/css/painel.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="<?php echo INCLUDE_PATH;?>/js/script-cadastro.js" ></script>
        <script src="<?php echo INCLUDE_PATH;?>/painel/painel_js/painel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </body>
</html>


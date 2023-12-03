<?php
    include('/xampp/htdocs/ProjetoTCC/classes/painel.php');
    $aux = new painel();
    global $chamado2;

    if (isset($_GET['descricao'])) {
        $chamado2 = $aux::BuscarChamados($_GET['descricao']);
    }

    else if (isset($_GET['editar_chamado'])) {
        $chamado2 = $aux::BuscarChamados($_GET['editar_chamado']);
    }

    else if (isset($_GET['ordem_servicos'])){
        $chamado2 = $aux::BuscarChamados($_GET['ordem_servicos']);
    }

    else if (isset($_GET['historico'])){
        $chamado2 = $aux::BuscarChamados($_GET['historico']);
    }

    else if (isset($_GET['editar_descricao'])){
        $chamado2 = $aux::BuscarChamados($_GET['editar_descricao']);
    }

    else if (isset($_GET['satisfacao'])) {
        $chamado2 = $aux::BuscarChamados($_GET['satisfacao']);
    }

    else {
        $chamado2 = $aux::BuscarChamados($_GET['chm']);
    }

    $fechamento = painel::verificar_Fechamento($chamado2["ID"]);
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
        <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    </head>
    <body>
        <header class="header-chamados">
            <h1>Solve Link</h1>
            <a href= "<?php echo INCLUDE_PATH; ?> /index.php"> Chamados <i class="fa-solid fa-arrow-right-from-bracket"> </i> </a>
        </header>

        <div class="detalhes-chamado">
            <aside class="menu-chamado">
                <ul>
                    <li id="chm_menu_1"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?descricao=<?php echo $chamado2["ID"];?>"><i class="fa-solid fa-book"></i> Descrição</a></li>
                    <li id="chm_menu_6"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?satisfacao=<?php echo $chamado2["ID"];?>"><i class="fa-regular fa-face-smile"></i> Satisfação</a></li>
                    <li id="chm_menu_2"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?editar_chamado=<?php echo $chamado2["ID"];?>"><i class="fa-regular fa-pen-to-square"></i> Editar Chamado</a></li>
                    <?php if($chamado2["fechamento"] == 0 && ( is_null($fechamento['fechamento']) || $fechamento['fechamento'] === '0') ) { ?>
                    <li id="chm_menu_3"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?editar_descricao=<?php echo $chamado2["ID"];?>"><i class="fa-regular fa-clipboard"></i> Editar Descrição</a></li>
                    <?php } ?>
                    <li id="chm_menu_4"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?ordem_servicos=<?php echo $chamado2["ID"];?>"><i class="fa-solid fa-pen"></i> Ordem de Serviço</a></li>
                    <li id="chm_menu_5"><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?historico=<?php echo $chamado2["ID"];?>"> <i class="fa-regular fa-bookmark"></i> Histórico</a></li>
                    <li id="chm_quebra_linha"><hr></li>
                    <li id="chm_menu_99"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?></li>
                    <li> 
                        <?php 
                            
                            if ($fechamento['fechamento'] === '1') {
                                echo '<i class="fa-solid fa-thumbs-up"></i> Aprovado';
                            } else if ($fechamento['fechamento'] === '0') {
                                echo '<i class="fa-solid fa-thumbs-down"></i> Recusado';
                            } elseif (is_null($fechamento['fechamento'])) {
                                echo '<i class="fa-regular fa-hand"></i> Não Avaliado';
                            }
                        ?> 
                    </li>
                </ul>

            </aside>

            <section class="painel-chamado">
            
                <section class="nav-chamados">

                <?php
                    $proximoRegistro = $aux::getProximoRegistro($chamado2["ID"]);
                    $RegistroAnterior = $aux::getRegistroAnterior($chamado2["ID"]);
                ?>

                <?php if($proximoRegistro) { ?>
                <a href="<?php echo INCLUDE_PATH;?>/painel/paginas/paginas_chamados/index.php?chm=<?php echo $proximoRegistro; ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
                <?php  } ?>

                <h1> <?php echo $chamado2["titulo"]. ' ('.$chamado2["ID"].') '; ?> </h1>

                <?php if($RegistroAnterior) { ?>
                <a href="<?php echo INCLUDE_PATH;?>/painel/paginas/paginas_chamados/index.php?chm=<?php echo $RegistroAnterior; ?>"> <i class="fa-solid fa-arrow-right"></i> </a>
                <?php } ?>

                </section>

            <?php
                    if (isset($_GET['descricao'])) {
                        include("./descricao_chamado.php");
                    }

                    else if (isset($_GET['editar_chamado'])) {
                        include("./editar_chamado.php");
                    }

                    else if (isset($_GET['ordem_servicos'])){
                        include("./ordem_servico.php");
                    }

                    else if (isset($_GET['historico'])){
                        include("./historico_chamado.php");
                    } //editar_descricao

                    else if (isset($_GET['editar_descricao'])) {
                        include("./editar_descricao.php");
                    }

                    else if (isset($_GET['satisfacao'])) {
                        include("./satisfacao.php");
                    }

                    else {
                        include("./descricao_chamado.php");
                    }
            ?>
            </section>
                </div>
   
        
        <script src="" async defer></script>
        <link href="<?php echo INCLUDE_PATH;?>/fontawesome/css/all.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>/css/chamados.css">
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <script src="<?php echo INCLUDE_PATH;?>/bibliotecas/jquery-3.7.1.min.js"> </script>

        <!-- bootstrap -->
        <script src="<?php echo INCLUDE_PATH;?>/painel/painel_js/chamado.js"></script>

    </body>
      
</html>

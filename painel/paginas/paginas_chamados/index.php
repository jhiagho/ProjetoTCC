<?php
    include('/xampp/htdocs/ProjetoTCC/classes/painel.php');
    $aux = new painel();
    global $chamado;

    if (isset($_GET['descricao'])) {
        $chamado = $aux::BuscarChamados($_GET['descricao']);
    }
    else if (isset($_GET['editar_chamado'])) {
        $chamado = $aux::BuscarChamados($_GET['editar_chamado']);
    }
    else if (isset($_GET['ordem_servicos'])){
        $chamado = $aux::BuscarChamados($_GET['ordem_servicos']);
    }
    else if (isset($_GET['historico'])){
        $chamado = $aux::BuscarChamados($_GET['historico']);
    }
    else {
        $chamado = $aux::BuscarChamados(array_key_first($_GET));
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <header class="header-chamados">
            <h1>Solve Link</h1>
            <a href= "<?php echo INCLUDE_PATH; ?> /index.php"> Chamados <i class="fa-solid fa-arrow-right-from-bracket"> </i> </a>
        </header>

        <section class="nav-chamados">

            <?php
                $proximoRegistro = $aux::getProximoRegistro($chamado["ID"]);
                $RegistroAnterior = $aux::getRegistroAnterior($chamado["ID"]);
            ?>

            <?php if($proximoRegistro) { ?>
            <a href="<?php echo INCLUDE_PATH;?>/painel/paginas/paginas_chamados/index.php?<?php echo $proximoRegistro; ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
            <?php  } ?>

            <h1> <?php echo $chamado["titulo"]. '('.$chamado["ID"].')'; ?> </h1>
            
            <?php if($RegistroAnterior) { ?>
            <a href="<?php echo INCLUDE_PATH;?>/painel/paginas/paginas_chamados/index.php?<?php echo $RegistroAnterior; ?>"> <i class="fa-solid fa-arrow-right"></i> </a>
            <?php } ?>

        </section>

        <article class="detalhes-chamado">
            <aside class="menu-chamado">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?descricao=<?php echo $chamado["ID"];?>"> <i class="fa-solid fa-book"></i> Descrição</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?editar_chamado=<?php echo $chamado["ID"];?>"> <i class="fa-regular fa-pen-to-square"></i> Editar Chamado</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?ordem_servicos=<?php echo $chamado["ID"];?>"><i class="fa-solid fa-pen"></i> Ordem de Serviço</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?historico=<?php echo $chamado["ID"];?>">  <i class="fa-regular fa-bookmark"></i> Histórico</a></li>
                </ul>

            </aside>

            <section class="painel-chamado">
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
                    }

                    else {
                        include("./descricao_chamado.php");
                    }
            ?>
            </section>
        </article>
   
        
        <script src="" async defer></script>
        <link href="<?php echo INCLUDE_PATH;?>/fontawesome/css/all.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>/css/chamados.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

        <!-- bootstrap -->

        <script src="<?php echo INCLUDE_PATH;?>/painel/painel_js/chamado.js"></script>

    </body>
      
</html>

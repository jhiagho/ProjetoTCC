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
            <i class="fa-solid fa-arrow-left"></i>
            <h1> <?php echo $chamado["titulo"]; ?> </h1>
            <i class="fa-solid fa-arrow-right"></i>
        </section>

        <article class="detalhes-chamado">
            <aside class="menu-chamado">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?descricao=<?php echo $chamado["ID"];?>">Descrição</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?editar_chamado=<?php echo $chamado["ID"];?>">Editar Chamado</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?ordem_servicos=<?php echo $chamado["ID"];?>">Ordem de Serviço</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_CHAMADO ?>/?historico=<?php echo $chamado["ID"];?>">Histórico</a></li>
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
    </body>
</html>

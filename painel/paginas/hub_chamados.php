<article class="hub_chamados">

    <section id="mydrawer" class="drawer">
         <?php
            include ("./painel/paginas/criar_chamados.php");
         ?>
    </section>

    <header class="header_chamados">
        <div class="pesquisar">
            <select name="column_pesquisar">
                <option value="0">ID</option>
                <option value="1">setor</option>
                <option value="2">localizacao</option>
                <option value="3">status</option>
                <input type="text" name="pesquisar" placeholder="pesquisar...">
                
                <input type="submit" name="btn_pesquisar" value="pesquisar" >
        </div>
        <div id="btn_toggle_drawer">
            <button onclick="toggleDrawer()">Criar chamado</button>
            <!-- <button type="button" onclick="window.location.href='./'">Criar chamado</button> -->
        </div>
    </header>

    <section class="conteudo_chamados">
        <section class="drawer">

        </section>

    </section>

    <?php
        if(isset($_POST['btn_criar_chamado']))
        echo 'ESTOU FUNCIONANDO';

    ?>
</article>

<h1>Teste estou na pagina hub_chamados</h1>
<?php
    echo $_SESSION['usuario']. '<hr>';
    echo $_SESSION['permissao']. '<hr>';
    echo $_SESSION['setor']. '<hr>';
?>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_3").classList.toggle("estilo-li");
    })
</script>
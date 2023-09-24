<article class="hub_chamados">

    <section id="mydrawer" class="drawer">
         <?php
            include ("./painel/paginas/criar_chamados.php");
         ?>
    </section>

    <header class="header_chamados">
        
            <form action="">

                <select name="column_pesquisar">
                    <option value="0">ID</option>
                    <option value="1">setor</option>
                    <option value="2">localizacao</option>
                    <option value="3">status</option>
                </select>
                    <input type="text" name="pesquisar" placeholder="pesquisar...">
                    <button type="submit" name="btn_pesquisar"> <i class="fa fa-search"></i> </button>
            </form>

        <div class="btn_criar_chamados" id="btn_toggle_drawer">
            <button onclick="toggleDrawer()"> <i class="fa-solid fa-plus"></i> Criar chamado</button>
            <!-- <button type="button" onclick="window.location.href='./'">Criar chamado</button> -->
        </div>

    </header>

    <section class="conteudo_chamados">
        <section class="drawer"> </section>
        
        <div class="container">
            <div class="row border">
                <div class="col-1 border"> ID </div>
                <div class="col border"> Titulo </div>
                <div class="col border"> Descrição </div>
                <div class="col border"> Status </div>
                <div class="col border"> localizaçao </div>
                <div class="col border"> Setor Atribuido </div>
                <div class="col border"> Tecnico </div>
                <div class="col border"> Requerente </div>
                <div class="col border"> Data_Inicio </div>
                <div class="col border"> Data_Fim </div>
                <div class="col border"> Prioridade </div>
            </div>
        </div>

    </section>

</article>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_3").classList.toggle("estilo-li");
    })
</script>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status </th>
                    <th scope="col">Localizaçao </th>
                    <th scope="col">Setor Atribuido </th>
                    <th scope="col">Tecnico </th>
                    <th scope="col">Requerente </th>
                    <th scope="col">Data_Inicio </th>
                    <th scope="col">Data_Fim </th>
                    <th scope="col">Prioridade </th>
                    <th scope="col">Solução </th>
                    <th scope="col">Avaliação </th>
                </tr>
            </thead>

        <?php
            $aux = new painel();
            $chamados = painel::listarChamados();

            $numRows = count($chamados);
            if ($numRows > 0) {
                $numCols = count($chamados[0]);
            
                for ($i = 0; $i < $numRows; $i++) {
                    echo '<tr>';
                    $values = array_values($chamados[$i]); // Obtenha apenas os valores, não as chaves
                    for ($j = 0; $j < $numCols; $j++) {
                        if ($j == 0)  echo '<th scope="row">'. $values[$j] .'</th>';

                        if (!$values[$j] == NULL)
                        {
                            if ($j == 3) $values[$j] = $aux->buscar_id_chamados($values[$j],'status','tb_status_chamados','id_status');
                            if ($j == 4) $values[$j] = $aux->buscar_id_chamados($values[$j],'nome_setor','tb_setor','id_localizacao');
                            if ($j == 5) $values[$j] = $aux->buscar_id_chamados($values[$j],'nome_setor','tb_setor','id_setor_atribuido');
                            if ($j == 6) $values[$j] = $aux->buscar_id_chamados($values[$j],'usuario','tb_usuarios','id_tec_atribuido');
                            if ($j == 7) $values[$j] = $aux->buscar_id_chamados($values[$j],'usuario','tb_usuarios','id_requerente');
                            if ($j == 10) $values[$j] = $aux->buscar_id_chamados($values[$j],'prioridade','tb_prioridades_chamados','id_prioridade');
                        }
                        if ($j == 12 || $j == 14) continue;
                        if ($j != 0) echo '<td>' . $values[$j] . '</td>';       
                    }
                    echo '</tr>';
                }
            }

            echo '</tbody>';
            echo '</table>';
            
            //echo '<div class="col border">' .$localizacao. '</div>'; 

        ?>
    </div>

    </section>

</article>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_3").classList.toggle("estilo-li");
    })
</script>
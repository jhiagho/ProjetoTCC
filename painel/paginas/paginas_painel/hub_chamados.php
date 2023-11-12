<article class="hub_chamados">

    <section id="mydrawer" class="drawer">
         <?php
            global $chamados;
            include ("./painel/paginas/paginas_painel/criar_chamados.php");
         ?>
    </section>

    <header class="header_chamados">
        
            <form method="post">

                <select id="main_select" name="column_pesquisar">
                    <option value="0">ID</option>
                    <option value="1">Titulo</option>
                    <option value="2">Descricao</option>
                    <option value="3">setor_atribuido</option>
                    <option value="4">Localização chamado</option>
                    <option value="5">Requerente</option>
                    <option value="6">técnico</option>
                    <option value="7">status</option>
                    <option value="8">Prioridade</option>
                </select>

                    <span id="dynamic_select_container"></span>

                    <!-- <input type="text" name="pesquisar" placeholder="pesquisar..."> -->
                    <button type="submit" name="btn_pesquisar"> <i class="fa fa-search"></i> </button>
            </form>
            <?php 
                $aux = new painel();
                if(isset($_POST['btn_pesquisar'])){
                    $column = $_POST['column_pesquisar'];
                    $detail = isset($_POST['detailed_search']) ? $_POST['detailed_search'] : null;
                    $detail = strip_tags($detail);
                    
                    $chamados = painel::PesquisarChamados($column,$detail);

                } else {
                    $chamados = painel::listarChamados();
                }
            ?>

        <div class="btn_criar_chamados" id="btn_toggle_drawer">
                <button onclick="toggleDrawer()"> <i class="fa-solid fa-plus"></i> Criar chamado</button>
            <form method="post">
                <button type="submit" name="btn_listar" id="btn_listar"> <i class="fa-solid fa-list"></i> Listar Chamados </button>
            </form>
                <?php
                    if(isset($_POST['btn_listar']))
                    {
                        $chamados = painel::listarChamados();
                    }
                ?>
        </div>

        <?php 
            if (empty($chamados)) {
                echo ' <div class="alert alert-info" role="alert">
                    <i class="fa-solid fa-circle-info"></i> Não foi encontrado nenhum registro de busca! </div> ';
            }
        ?>

    </header>

    <section class="conteudo_chamados">
        <section class="drawer"> </section>

        <!-- table-hover table-bordered table-striped -->
        <table class="table table-hover table-bordered tabela-ajustada">
            <thead class="thead-dark">
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
        
            $numRows = (is_array($chamados) || $chamados instanceof Countable) ? count($chamados) : 0;
            if ($numRows > 0) {
                $numCols = (is_array($chamados) || $chamados instanceof Countable) ? count($chamados[0]) : 0;
            
                for ($i = 0; $i < $numRows; $i++) {
                    $values = array_values($chamados[$i]); // Obtenha apenas os valores, não as chaves

                    if ($values[3] == 1) echo '<tr class="table-success">';
                    else if ($values[3] == 3) echo '<tr class="table-warning">';
                    else if ($values[3] == 2) echo '<tr class="table-secondary">';
                        else echo '<tr>';

                    for ($j = 0; $j < $numCols; $j++) {

                        if ($j == 0)  // ID do chamado
                            {
                                echo '<th scope="row">'. $values[$j] .'</th>';
                            }
                        if ($j == 1)  echo '<td> <a href="'.INCLUDE_PATH.'/painel/paginas/paginas_chamados/index.php?chm='.$values[0].'">' .$values[$j]. '</a> </td>';

                        if (!$values[$j] == NULL)
                        {
                            if ($j == 3) $values[$j] = painel::buscar_id_tabelas($values[$j],'status','tb_chamados','tb_status_chamados','id_status');
                            if ($j == 4) $values[$j] = painel::buscar_id_tabelas($values[$j],'nome_setor','tb_chamados','tb_setor','id_localizacao');
                            if ($j == 5) $values[$j] = painel::buscar_id_tabelas($values[$j],'nome_setor','tb_chamados','tb_setor','id_setor_atribuido');
                            if ($j == 6) $values[$j] = painel::buscar_id_tabelas($values[$j],'usuario','tb_chamados','tb_usuarios','id_tec_atribuido');
                            if ($j == 7) $values[$j] = painel::buscar_id_tabelas($values[$j],'usuario','tb_chamados','tb_usuarios','id_requerente');
                            if ($j == 8 || $j == 9) {
                                $values[$j] = painel::formatarData($values[$j]);
                            }
                            if ($j == 10) $values[$j] = painel::buscar_id_tabelas($values[$j],'prioridade','tb_chamados','tb_prioridades_chamados','id_prioridade');
                        }
                        if ($j == 11) {
                            $solucao = painel::buscar_solucao($values[0]);
                            if ($solucao == false) $values[$j] = '';
                            else $values[$j] = $solucao["descricao"];  
                        }
                        if ($j == 12){
                            if($values[$j] == 0)  $values[$j] = ''; 
                            else {
                                $avaliacao = painel::buscar_avaliacao($values[0]);
                                if ($avaliacao == false) $values[$j] = '';
                                else $values[$j] = $avaliacao["avaliacao"];
                            } 
                        }

                        if ($j == 13 || $j == 14) continue;

                        if ($j > 1) {
                                $info_avaliacao = '';
                                if ($j == 2) { // Assumindo que o índice 2 é onde a descrição está
                                    echo '<td class="descricao-col">' . $values[$j] . '</td>';

                                } else if($j == 10){
                                    if($values[$j] == 'Critica' || $values[$j] == 'Muito Alta') $color = "bg-danger";
                                    if($values[$j] == 'Alta' || $values[$j] == 'Media') $color = "table-danger";
                                    if($values[$j] == 'Baixa') $color = "table-warning";
                                    if($values[$j] == 'Muito Baixa') $color = "table-warning";

                                    echo '<td class="'.$color.'">' .$values[$j]. '</td>';

                                } else if($j == 12) {
                                    if($values[$j] != '') {
                                        // $info_avaliacao = '<i class="fa-solid fa-star" style="color: #ffc800;"> </i>';
                                        // echo '<td>' .$values[$j].$info_avaliacao. '</td>';

                                        $avaliacao = (int)$values[$j]; // Cast para inteiro, garantindo que trabalhamos com números
                                        $estrelas = '';

                                        if ($avaliacao > 0) {
                                            for ($k = 0; $k < $avaliacao; $k++) {
                                                $estrelas .= '<i class="fa-solid fa-star" style="color: #ffc800;"></i>';
                                            }
                                            for ($k = $avaliacao; $k < 5; $k++) {
                                                $estrelas .= '<i class="fa-regular fa-star" style="color: #ccc;"></i>';
                                            }
                                        } else {
                                            // Caso não haja avaliação
                                            $estrelas = 'Não avaliado'; // Ou você pode escolher mostrar 5 estrelas cinzas ou nenhum ícone
                                        }
                                        echo '<td class="avaliacao-col">' . $estrelas . '</td>';
                                    }
                                }
                                else {
                                    echo '<td>' .$values[$j]. '</td>';
                                }
                            }
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
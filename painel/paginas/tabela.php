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

            $numRows = (is_array($chamados_menu) || $chamados_menu instanceof Countable) ? count($chamados_menu) : 0;
            if ($numRows > 0) {
                $numCols = (is_array($chamados_menu) || $chamados_menu instanceof Countable) ? count($chamados_menu[0]) : 0;
            
                for ($i = 0; $i < $numRows; $i++) {
                    $values = array_values($chamados_menu[$i]); // Obtenha apenas os valores, não as chaves

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
<div class="form-header">
    <div class="titulo">
        <h2>Listar Usuario</h2>
    </div>
</div> <!--form-header -->

<?php
    global $listar_usuario;
?>

<div class="header_listar">
    <form method="post">

    <select id="main_select2" name="column_pesquisar">
        <option value="0">ID</option>
        <option value="1">Primeiro Nome</option>
        <option value="2">Sobrenome</option>
        <option value="3">usuario</option>
        <option value="4">Setor</option>
        <option value="5">Permissão</option>
    </select>

        <span id="dynamic_user_select_container"></span>

        <!-- <input type="text" name="pesquisar" placeholder="pesquisar..."> -->
        <button type="submit" id="pesquisar_user" name="btn_pesquisar"> <i class="fa fa-search"></i> </button>
        <button type="submit" name="btn_listar" id="btn_listar"> <i class="fa-solid fa-list"></i> Listar usuario </button>

    </form>
</div>
            <?php 
                $aux = new painel();
                if(isset($_POST['btn_pesquisar'])) {
                    $column = $_POST['column_pesquisar'];
                    $detail = isset($_POST['detailed_search_user']) ? $_POST['detailed_search_user'] : null;
                    $detail = strip_tags($detail);
                    echo $column;
                    echo $detail;
                   
                }
                else {
                    $listar_usuario = painel::listarTodosUsuarios();
                }

                if(isset($_POST['btn_listar'])) {
                    $listar_usuario = painel::listarTodosUsuarios();
                }
                if (empty($listar_usuario)) {
                    echo ' <div class="alert alert-info" role="alert">
                        <i class="fa-solid fa-circle-info"></i> Não foi encontrado nenhum registro de busca! </div> ';
                }
            ?>

<div class="table-responsive">
<table class="table table-hover table-bordered">

<thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Primeiro Nome </th>
        <th scope="col">Sobrenome </th>
        <th scope="col">Contato </th>
        <th scope="col">Setor </th>
        <th scope="col">usuario </th>
        <th scope="col">Permissão </th>
    </tr>
</thead>
<?php

$numRows = (is_array($listar_usuario) || $listar_usuario instanceof Countable) ? count($listar_usuario) : 0;
if ($numRows > 0) {
    $numCols = (is_array($listar_usuario) || $listar_usuario instanceof Countable) ? count($listar_usuario[0]) : 0;

    echo '<tr>';
    for ($i = 0; $i < $numRows; $i++) {
        $values = array_values($listar_usuario[$i]); // Obtenha apenas os valores, não as chaves

        for ($j = 0; $j < $numCols; $j++) {

            if ($j == 0) echo '<th scope="row">'. $values[$j] .'</th>';
            if ($j == 1)  echo '<td> <a href="'.INCLUDE_PATH.'/?editar_usuario='.$values[0].'"> <i class="fa-solid fa-pen"></i> ' .$values[$j]. '</a> </td>';

            if($j > 1) {
                if ($j == 4)  $values[$j] = painel::buscar_nome_setor($values[$j+1]); //pegar nome do usuario,e o usuario e o 5
                if ($j == 6 || $j == 7) continue;
                if ($j == 8)  $values[$j] = painel::nome_permissao($values[$j]);

                echo '<td>' .$values[$j]. '</td>';
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
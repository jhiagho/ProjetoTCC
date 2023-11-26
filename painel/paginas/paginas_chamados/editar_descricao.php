<?php
      // $chamado2['fechamento'] == '1' (Travar Editar a descricao, Editar o chamado caso o chamado seja Fechado, avisar o usuário com um modal)
    $id_chamado = $chamado2["ID"];  
    $aux5 = new painel();
    $aux6 = new Banco();
    $solution = $aux5::buscar_solucao($id_chamado);
    $tarefa_pendente = $aux5::buscar_id_tabelas_all($id_chamado,'tb_tarefa_pendentes','tb_chamados','tarefa_chamado_id');
?>

<section class="header_editar_descricao">
        <h1> Editar Solução </h1>
</section>

<?php if(isset($solution) && $solution != false && ($_SESSION['Usuario_ID'] == $solution['tecnico_id'] || $_SESSION['permissao'] == 'admin') ) { ?>

<section class="alterar_solucao">
    <form method="post">

        <div class="input-box">
            <label for="descricao">Descrição</label>
                <textarea type="text" id="descricao" name="solution_descricao" rows="6" cols="100" placeholder="Descrição do chamado..." required> <?php echo $solution['descricao'] ?> </textarea>
                <span></span>
        </div>

            <div class="submit-group">
                <button name="bt_alterar_solution"> <i class="fa-regular fa-pen-to-square"></i> Alterar Solução </button>
            </div>
        </div>
    </form>

      <?php 
      
      if(isset($_POST['bt_alterar_solution'])){
            $solution_text = $_POST['solution_descricao'];
            $solution_text = strip_tags($solution_text);
            $id_solution = $solution['id'];

            $banco = $aux6::conectar();
            $query = "UPDATE `tb_solucao` SET `descricao` = '$solution_text' WHERE `tb_solucao`.`id` = $id_solution;";
            $stmt = $banco->prepare($query);
            $stmt->execute();

            header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?'.$id_chamado);
            ob_end_flush();
      }
      
      ?>

</section>

<?php } else { ?>
      <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading"> Nenhuma Solução foi criada! </h4>
                  <p> Verifique a aba de "Descrição", Crie um nova Solução, para que possa ser edita por aqui !</p>
                  <hr>
                  <p class="mb-0"> Importante!! Só ira aparecer a solução caso esteja logado quem a criou ou um admin do sistema. </p>
            </div>
<?php } ?>

<div class="linha-horizontal"></div>

<section class="header_editar_descricao">
        <h1> Editar Tarefa Pendente </h1>
</section>

<section class="alterar_tarefas">
    <?php 
        if(isset($tarefa_pendente) && $tarefa_pendente != false) {
        foreach ($tarefa_pendente as $key => $value) {  ?>

        <form id="form_alterar_tarefa" method="post">

                        <div class="h1-alterar">
                              <h1 id="h1_pendente_header"> > Tarefa Pendente ID: <?php echo $value['ID']?></h1>
                        </div>

                        <div class="input-box">
                              <label for="descricao">Descrição</label>
                              <textarea id="alterar_pendente_Text" name="alterar_pendente_Text" rows="8" cols="105" placeholder="Insira uma nova tarefa para o chamado..." required> <?php echo $value['Descricao'] ?> </textarea>
                              <span class="error-message" id="task_pendente_Text_Error"></span>
                        </div>

                        <div class="status-alterar_tarefa">
                              <div class = "input-box">
                                    <label>Atribuir Setor:*</label>
                                    <select id="alterar_slc_setor_taskPendente" name="slc_setor_taskPendente" onchange="updateLocalizacao()" class="js-example-basic-single" required>
                                    <option value="" disabled selected hidden> Selecione um Setor </option>
                                    <?php
                                          $aux = new painel(); 
                                          $aux = $aux->listarSetor();
                                                            
                                          foreach ($aux as $key => $value1) {
                                                $selected = ($value['setor_tarefa'] - 1 == $key) ? 'selected' : '';
                                                echo '<option value="' .$key. '" data-localizacao="' . $value1['localizacao'] . '" '.$selected. '>' . $value1['nome_setor'] . '</option>';
                                          }
                                    ?>
                                    </select>
                                    <span id="localizacaoSpan"></span>
                              </div>
                          
                              <div class = "input-box">
                                    <label>Atribuir Tecnico: *</label>
                                    <select id="alterar_slc_user_taskPendente"  name="slc_user_taskPendente" class="js-example-basic-single" required>
                                    <option value="" disabled selected hidden> Selecione um Tecnico </option>
                                    <?php
                                          $aux = new painel();
                                          $aux = $aux->listarUsuariosTecnicos();
                                                            
                                          foreach ($aux as $key => $value1) {
                                                $selected = ($value['tecnico_tarefa'] == $value1['id']) ? 'selected' : '';
                                                echo '<option value="' . $value1['id'] . '" ' . $selected . '>' . $value1['usuario'] . '</option>';
                                          }
                                    ?>
                                    </select>
                                    <span class="error-message" id="task_slc_user_taskPendente_Error"></span>
                              </div>
                        </div>

                        <input type="hidden" name="id_tarefa_form" value="<?php echo $value['ID']; ?>">

                        <div class="submit-group">
                              <button id="alterar_btn_Tarefa_pendente" name="alterar_btn_Tarefa_pendente"> <i class='fa-regular fa-pen-to-square'></i> Alterar Tarefa </button>
                        </div>
        </form>


         <?php 
            if(isset($_POST['alterar_btn_Tarefa_pendente']) && $_POST['id_tarefa_form'] == $value['ID'])
            {
                  $id_tarefa = $value['ID'];
                  $descricao = strip_tags($_POST['alterar_pendente_Text']);
                  $tecnico = $_POST['slc_user_taskPendente'];
                  $setor = $_POST['slc_setor_taskPendente'] + 1;

                  echo $id_tarefa.'<br>';
                  echo $descricao.'<br>';
                  echo $tecnico.'<br>';
                  echo $setor .'<br>';

                  $banco2 = $aux6::conectar();
                  $query = "UPDATE `tb_tarefa_pendentes` SET `Descricao` = '$descricao', `tecnico_tarefa` = '$tecnico', `setor_tarefa` = '$setor' WHERE `tb_tarefa_pendentes`.`ID` = $id_tarefa;";
                  $stmt = $banco2->prepare($query);
                  $stmt->execute();
      
                  header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?'.$id_chamado);
                  ob_end_flush();
            }
         
         ?>

        <div class="linha-horizontal"></div>

        <script>
            function updateLocalizacao() {
                  var selectElement = document.getElementById('alterar_slc_setor_taskPendente');
                  var selectedOption = selectElement.options[selectElement.selectedIndex];
                  var localizacao = selectedOption.getAttribute('data-localizacao');
                  
                  // Atualizar o span com a localização
                  document.getElementById('localizacaoSpan').textContent = localizacao;
            }

            document.addEventListener("DOMContentLoaded", function() {             
                  $('.js-example-basic-single').each(function() {
                        $(this).select2();
                  });
                  $('.select2-container--default .select2-selection--single').css({
                        'border': 'none',
                        'border-radius': '10px',
                        'box-shadow': '1px 1px 6px #0000001c',
                        'height': '38px'
                  });
                  // Ajusta o alinhamento vertical do texto e o padding
                  $('.select2-container--default .select2-selection--single .select2-selection__rendered').css({
                        'line-height': '40px',
                        'padding-left': '10px',
                        'padding-right': '10px',
                        'top': '0'
                  });
                  // Estiliza e ajusta a posição do ícone de seta para baixo
                  $('.select2-container--default .select2-selection--single .select2-selection__arrow').css({
                        'height': '40px'
                  });
            });
        </script>

     <?php  } 
      } else { ?>
            <div class="alert alert-warning" role="alert">
                  <h4 class="alert-heading"> Nenhuma Tarefa Pendente Criada! </h4>
                  <p> Verifique a aba de "Descrição", Crie um nova tarefa, para que possa ser edita por aqui !</p>
                  <hr>
                  <p class="mb-0"> Importante!! Só ira aparecer a tarefa caso seja quem a criou ou um admin do sistema. </p>
            </div>
      <?php } ?>
</section>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#chm_menu_3").classList.toggle("chm_estilo-li");
    })
</script>


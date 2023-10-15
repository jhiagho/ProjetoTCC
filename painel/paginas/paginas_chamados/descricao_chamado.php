<?php $aux2 = new painel(); ?>

<section class="botao-box">
      <div id="botao_botao-box2">
            <button onclick="openSolutionBox()" name="btn_Solucionar"> <i class="fa-regular fa-circle-check"></i> Solucionar</button>
            <button onclick="openTarefaBox()"name="btn_trf_pendente"> <i class="fa-solid fa-plus"></i> Adicionar Tarefa Pendente</button>
            <button name="btn_avaliar"><i class="fa-regular fa-star"></i> Avaliar</button>
      </div>
</section>

<div id="slider" class="slide-up">
      <div id ="slider_id">
            <div class="add_solutionBox">
                  <div class = "header_solution">
                              <span>Adicione uma solução</span>
                              <button onclick="closeSolutionBox()"> <i class="fa-solid fa-xmark"></i> </button>
                  </div>
                  <form method="post">
                               <!-- Editor -->
                        <div id="editor">
                              <textarea name="solutionText" id="solutionText" rows="8" cols="105" placeholder="Insira a Solução do Chamado..."></textarea>
                        </div>

                        <button name="btn_adicionar_solucao">Adicionar Solução</button>
                  </form>
                 
            </div>
      </div>
</div>

      <?php


      ?>


<div id="slider_2" class="slide-up_2">
      <div id ="slider_id_2">
            <div class="add_TarefaPendente">
                  <div class="header_task">
                        <span>Adicionar Tarefa Pendente</span>
                        <button onclick="closeTarefaBox()"> <i class="fa-solid fa-xmark"></i> </button>
                  </div>

                  <div id="editor">
                        <textarea id="solutionText" rows="8" cols="105"></textarea>
                  </div>

                  <div class="Box-button_tarefa_pendente">
                        <form action="#">

                              <div class = "input-box">
                                    <label>Setor Atribuido:*</label>
                                    <select id="slc_setor_taskPendente" name="slc_setor_taskPendente" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;">
                                    <option value="" disabled selected hidden> Selecione um Setor </option>
                                    <?php
                                          $aux = new painel(); 
                                          $aux = $aux->listarSetor();
                                                            
                                          foreach ($aux as $key => $value) {
                                                echo '<option value="' .$key . '">'.$value['nome_setor'].'</option>';
                                          }
                                    ?>
                                    </select>
                              </div>
                          
                              <div class = "input-box">
                                    <label>Atribuir Tecnico: *</label>
                                    <select id="slc_user_taskPendente"  name="slc_user_taskPendente" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;">
                                    <option value="" disabled selected hidden> Selecione um Tecnico </option>
                                    <?php
                                          $aux = new painel();
                                          $aux = $aux->listarUsuariosTecnicos();
                                                            
                                          foreach ($aux as $key => $value) {
                                                echo '<option value="' .$value['id']. '">'.$value['usuario'].'</option>';
                                          }
                                    ?>
                                    </select>
                              </div>

                              <div class = "input-box">
                                    <label>Status:</label>
                                    <select id="select_status_taskPendente" name="select_status_taskPendente" style="width:250px; height: 29px; border-radius: 5px;" readonly>
                                    <option value="3">Pendente</option>
                                    </select>
                              </div>
                        </form> 
                  </div>

                  <button name="btn_Tarefa_pendente">Adicionar Tarefa</button>
            </div>
      </div>
</div>



<section class="detalhes-box">
      <h1><?php echo $chamado["titulo"]?></h1>
      <p><?php echo $chamado["descricao"]?></p>
      <span><i>Requrente: </i> <?php echo $aux2->buscar_id_chamados($chamado["id_requerente"],'usuario','tb_usuarios','id_requerente');?> </span>
</section>



<?php  if($chamado["solucao"] != NULL) { 
          
          echo '
            <section class="solucao-box">
                  <h1>Solução</h1>
                  <p> '.$chamado["solucao"].'</p>
                  <span> <i>Técnico: </i> </span>
            </section>
          ';
            }
      ?>

<?php 
      // Slide down, Slide up
      echo "<pre>";
      print_r($chamado);
      echo "</pre>";
?>

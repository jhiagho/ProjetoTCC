<?php $aux2 = new painel(); 
      $aux3 = new painel(); 
      $aux4 = new painel();
      $infoSolution = $aux4::buscar_solucao($chamado2["ID"]);
      $infoPendente = $aux3::buscar_id_tabelas_all($chamado2["ID"],'tb_tarefa_pendentes','tb_chamados','tarefa_chamado_id');
?>


<section class="botao-box">
      <div id="botao_botao-box2">
            <?php 
                  if ($infoSolution == false) {
                        echo '<button onclick="openSolutionBox()" id="btn_Solucionar" name="btn_Solucionar"> <i class="fa-regular fa-circle-check"></i> Solucionar</button>';
                        echo '<button onclick="openTarefaBox()" id="btn_trf_pendente" name="btn_trf_pendente"> <i class="fa-solid fa-plus"></i> Adicionar Tarefa Pendente</button>';
                  }
            ?>
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
                              <span class="error-message" id="task_solutionText_Error"></span>
                        </div>
                        
                        <div class = "footer_solution">

                              <button name="btn_adicionar_solucao"> <i class='fa-regular fa-circle-check'></i> Adicionar Solução </button>

                              <div class="input-box">
                              <label for="Data_Fim">Data de Finalizacão: </label>
                              <input id="solution_data_fim" type="datetime-local" name="solution_data_fim" readonly>
                              </div>

                        </div>
                  </form>
                 
            </div>
      </div>
</div>

<?php
            if(isset($_POST['btn_adicionar_solucao']))
            {
                  $solucao = $_POST['solutionText'];
                  $id_chamado = $chamado2["ID"];
                  $id_usuario = $_SESSION['Usuario_ID'];
                  $data_fim = $_POST['solution_data_fim'];
                  $banco = Banco::conectar();

                  //Adicionar solução ao chamados
                  $solucao = strip_tags($solucao);

                  $arr = array($solucao, $id_usuario, $id_chamado);
                  $sql = "INSERT INTO `tb_solucao` VALUES (NULL,?,?,?)";
                  $stmt = $banco->prepare($sql);
                  
                  if($stmt->execute($arr)){
                        //echo '<script>  alert("Solução adicionado no chamado."); </script>';

                        //$banco = Banco::conectar();
                        $sql = "UPDATE tb_chamados SET id_status = '4' , data_final = '$data_fim' , id_tec_atribuido = '$id_usuario' WHERE ID = $id_chamado";
                        $stmt = $banco->prepare($sql);
                        $stmt->execute();

                        header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?chm='.$id_chamado);
                        ob_end_flush();
                  } else {

                  }

            }

?>

<div id="slider_2" class="slide-up_2">
      <div id ="slider_id_2">
            <div class="add_TarefaPendente">
                  <div class="header_task">
                        <span>Adicionar Tarefa Pendente</span>
                        <button onclick="closeTarefaBox()"> <i class="fa-solid fa-xmark"></i> </button>
                  </div>

                  <div class="Box-button_tarefa_pendente">
                        <form id="form_tarefa" method="post">

                        <div id="editor">
                              <textarea id="pendente_Text" name="pendente_Text" rows="8" cols="105" placeholder="Insira uma nova tarefa para o chamado..." ></textarea>
                              <span class="error-message" id="task_pendente_Text_Error"></span>
                        </div>

                              <div class = "input-box">
                                    <label>Setor Atribuido:*</label>
                                    <select id="slc_setor_taskPendente" name="slc_setor_taskPendente" class="js-example-basic-single" style="width:300px; height: 35px; border-radius: 5px;">
                                    <option value="" disabled selected hidden> Selecione um Setor </option>
                                    <?php
                                          $aux = new painel(); 
                                          $aux = $aux->listarSetor();
                                                            
                                          foreach ($aux as $key => $value) {
                                                echo '<option value="' .$key . '">'.$value['nome_setor'].'</option>';
                                          }
                                    ?>
                                    </select>
                                    <span class="error-message" id="task_slc_setor_taskPendente_Error"></span>
                              </div>
                          
                              <div class = "input-box">
                                    <label>Atribuir Tecnico: *</label>
                                    <select id="slc_user_taskPendente"  name="slc_user_taskPendente" class="js-example-basic-single" style="width:300px; height: 35px; border-radius: 5px;">
                                    <option value="" disabled selected hidden> Selecione um Tecnico </option>
                                    <?php
                                          $aux = new painel();
                                          $aux = $aux->listarUsuariosTecnicos();
                                                            
                                          foreach ($aux as $key => $value) {
                                                echo '<option value="' .$value['id']. '">'.$value['usuario'].'</option>';
                                          }
                                    ?>
                                    </select>
                                    <span class="error-message" id="task_slc_user_taskPendente_Error"></span>
                              </div>

                              <div class = "input-box">
                                    <label for="Data_Fim">Data_de_criação:* </label>
                                    <input id="task_data" type="datetime-local" name="task_data" style="width:300px; height: 34px; border-radius: 5px;" readonly>
                              </div>

                              <div class = "input-box">
                                    <label>Status:</label>
                                    <select id="select_status_taskPendente" name="select_status_taskPendente" style="width:300px; height: 40px; border-radius: 5px;">
                                    <option value="3">Pendente</option>
                                    </select>
                              </div>
                              
                              <div class="input-submit">
                                    <button name="btn_Tarefa_pendente"> <i class='fa-solid fa-plus'></i> Adicionar nova Tarefa </button>
                              </div>
                              
                        </form> 
                  </div>
            </div>
      </div>
</div>

<?php
      if(isset($_POST['btn_Tarefa_pendente']))
      {

            $pendente = $_POST['pendente_Text'];
            $setor = $_POST['slc_setor_taskPendente'] + 1;
            $tecnico = $_POST['slc_user_taskPendente'];
            $data = $_POST['task_data'];
            $status = $_POST['select_status_taskPendente'];

            $id_chamado = $chamado2["ID"];
            $id_usuario_que_criou = $_SESSION['Usuario_ID'];
            $banco = Banco::conectar();

            $pendente = strip_tags($pendente); // remove tag Html inseridas no código;

            $arr = array($pendente, $data, $tecnico, $setor, $id_chamado, $id_usuario_que_criou);
            $sql = "INSERT INTO `tb_tarefa_pendentes` VALUES (NULL,?,?,?,?,?,?)";
            $stmt = $banco->prepare($sql);

            if($stmt->execute($arr)){

                  $sql = "UPDATE tb_chamados SET id_status = '3' WHERE ID = $id_chamado";
                  $stmt = $banco->prepare($sql);
                  $stmt->execute();

                  header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?chm='.$id_chamado);
                  ob_end_flush();
            }else{

            }


      }
?>



<section class="detalhes-box">
      <div class="header-box">
            <h1> Chamado criado por: <strong> <?php echo $aux2->buscar_id_tabelas($chamado2["id_usuario_criou"],'usuario','tb_chamados','tb_usuarios','id_usuario_criou');?> </strong> 
             em <strong> <?php echo $aux2->formatarData($chamado2["data_incial"]); ?> </strong> </h1>
      </div>
      <h1><?php echo $chamado2["titulo"]?></h1>
      <p><?php echo $chamado2["descricao"]?></p>
      <span><i>Requerente: </i> <?php echo $aux2->buscar_id_tabelas($chamado2["id_requerente"],'usuario','tb_chamados','tb_usuarios','id_requerente');?> </span>
</section>


<section class="container-descricao">

<?php

if(isset($infoPendente) && $infoPendente != false)
{
      foreach ($infoPendente as $key => $value) {
            $usuario_que_criou = $aux2::buscar_id_tabelas($value["usuario_que_criou_tarefa"],'usuario','tb_tarefa_pendentes','tb_usuarios','usuario_que_criou_tarefa');
            $setor_atribuido = $aux2::buscar_id_tabelas($value["setor_tarefa"],'nome_setor','tb_tarefa_pendentes','tb_setor','setor_tarefa');
            $tecnico_tarefa = $aux2::buscar_id_tabelas($value["tecnico_tarefa"],'usuario','tb_tarefa_pendentes','tb_usuarios','tecnico_tarefa');

            echo '
            <section class="tarefa-box">
                  <div class="header-box">
                        <h1 id="h1_header_solucao"> Tarefa Pendente criado por: <strong> '.$usuario_que_criou.' </strong> 
                        em <strong> '.$aux2::formatarData($value["data_tarefa"]).' </strong> </h1>
                  </div>
                  <h1> Tarefa Pendente </h1>
                  <p> '.$value["Descricao"].' </p>
      
                  <div class="info_tarefa_box">
                        <span> <i>Setor Atribuido: </i> '.$setor_atribuido.'</span>
                        <span> <i>Tecnico Atribuido: </i> '.$tecnico_tarefa.'</span>      
                  </div>
                  
            </section>
          ';
      }
}


if(isset($infoSolution) && $infoSolution != false) {

      //     echo "<pre>";
      //     print_r($infoAux);
      //     echo "</pre>";

          $tecnico = $aux2->buscar_id_tabelas($infoSolution['tecnico_id'],'usuario','tb_solucao','tb_usuarios','tecnico_id');
          
          echo '
            <section class="solucao-box">
                  <div class="header-box">
                        <h1 id="h1_header_solucao"> Chamado Finalizado em: <strong> '.$aux2->formatarData($chamado2["data_final"]).' </strong> </h1>
                  </div>
                  <h1> Solução </h1>
                  <p> '.$infoSolution["descricao"].'</p>
                  <span> <i>Técnico: '.$tecnico.' </i> </span>
            </section>
          ';
             }
      ?>

</section>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#chm_menu_1").classList.toggle("chm_estilo-li");
    })
</script>
<section class="botao-box">
      <button name="btn_Solucionar"> <i class="fa-regular fa-circle-check"></i> Solucionar</button>
      <button name="btn_trf_pendente"> <i class="fa-solid fa-plus"></i> Adicionar Tarefa Pendente</button>
      <button name="btn_avaliar"><i class="fa-regular fa-star"></i> Avaliar</button>
</section>

<div class="add_solutionBox" id="add_solutionBox">
     <div class=header_solution>
            <span>Adicione uma solução</span>
            <button onclick="closeSolutionBox()"> <i class="fa-solid fa-xmark"></i> </button>
     </div>
    <textarea id="solutionText" rows="8" cols="105"></textarea>
    <button name="btn_adicionar_solucao">Adicionar Solução</button>
</div>


<section class="detalhes-box">
      <h1><?php echo $chamado["titulo"]?></h1>
      <p><?php echo $chamado["descricao"]?></p>
      <span><i>Requrente: </i> <?php echo $aux->buscar_id_chamados($chamado["id_requerente"],'usuario','tb_usuarios','id_requerente');?> </span>
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
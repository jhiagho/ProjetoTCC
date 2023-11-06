<section class="header_editar_chamado">
        <h1> Meus Chamados </h1>
</section>

<?php 
    global $chamados_menu;
?>

<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Chamados Novos
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <?php 
                $chamados_menu = painel::PesquisarChamados(7,1); // 7 - status, 1 - Novo
                include('tabela.php');
            ?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Chamados Pendentes
        </button>
      </h5>
    </div>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">     
            <?php 
                $chamados_menu = painel::PesquisarChamados(7,3); // 7 - status, 1 - Pendente
                include('tabela.php');
            ?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Chamados para o Setor: <strong> <?php echo $_SESSION['setor'];?> </strong>
        </button>
      </h5>
    </div>

    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
            <?php 
                $setor = $_SESSION['Usuario_id_setor'];
                $chamados_menu = painel:: PesquisarChamadosPessoal(1,$setor); // 7 - setor, 1 - Suporte ao Usuario
                include('tabela.php');
            ?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Chamados Atribuido para: <strong> <?php echo $_SESSION['usuario'];?> </strong>
        </button>
      </h5>
    </div>

    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
            <?php 
                $id_usuario = $_SESSION['Usuario_ID'];
                $chamados_menu = painel:: PesquisarChamadosPessoal(2,$id_usuario); // 7 - setor, 1 - Suporte ao Usuario
                include('tabela.php');
            ?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Chamados A serem Avaliados.
        </button>
      </h5>
    </div>

    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
            <?php 
                $id_usuario2 = $_SESSION['Usuario_ID'];
                $chamados_menu = painel::PesquisarAvaliacao($id_usuario2); // 7 - setor, 1 - Suporte ao Usuario
                include('tabela.php');
            ?>
      </div>
    </div>
  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_2").classList.toggle("estilo-li");
    })
</script>
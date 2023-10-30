<?php
    $id_chamado = $chamado["ID"];  
    $aux4 = new painel();
    $aux5 = new Banco();
    $data_inicial_formatada = date('Y-m-d\TH:i', strtotime($chamado['data_incial']));
    $data_final_formatada = date('Y-m-d\TH:i', strtotime($chamado['data_final']));
?>

<article class="editar_chamado">

    <section class="header_editar_chamado">
        <h1> Editar Chamado </h1>
    </section>

    <section class="conteudo_editar_chamado">

    <?php
    if (isset($_POST['bt_alterar_cadastro'])) 
    {
        $data_inicial = $_POST['data_incial'];
        $data_final = $_POST['data_final'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $id_status = $_POST['id_status'];
        $id_prioridade = $_POST['id_prioridade'];
        $id_localizacao = $_POST['id_localizacao_editar_chm'] + 1;
        $id_setor_atribuido = $_POST['id_setor_atribuido'] + 1;
        $id_tec_atribuido = $_POST['id_tec_atribuido'];
        $id_requerente = $_POST['id_requerente'];

        $titulo = strip_tags($titulo);
        $descricao = strip_tags($descricao);

        $banco1 = $aux5::conectar();
        $arr = array($titulo,$descricao,$id_status,$id_localizacao,$id_setor_atribuido,$id_tec_atribuido,$id_requerente,$data_inicial,$data_final,$id_prioridade);
        
        $query = "UPDATE `tb_chamados` SET titulo = ?, descricao = ? , id_status = ?, id_localizacao = ?, id_setor_atribuido = ?, id_tec_atribuido = ?, 
                  id_requerente = ?, data_incial = ?, data_final = ?, id_prioridade = ?
                  WHERE ID = $id_chamado";
        $stmt = $banco1->prepare($query);
        
        if($stmt->execute($arr)) {

            header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?'.$id_chamado);
            ob_end_flush();
           }    
       else{
            echo '<script> alert('.$stmt->errorInfo().') </script>';
            //print_r($stmt->errorInfo());
       }
    }

    if(isset($_POST['bt_Fechar_chamado']))
    {
        $banco1 = $aux5::conectar();
        $query = "UPDATE `tb_chamados` SET `fechamento` = '1' WHERE ID = $id_chamado";
        $stmt = $banco1->prepare($query);
        $stmt->execute();

        if($stmt->execute()){
            echo ' <div class="alert alert-success" role="alert">
                   <i class="fa-regular fa-square-check"></i> Chamdo foi Fechado com Sucesso!
                    </div>
                        ';
        }

    }

    if(isset($_POST['bt_Excluir_chamado']))
    {
        $banco1 = $aux5::conectar();
        $contPendente = $aux4::verificar_registro_chamado($id_chamado,'tb_tarefa_pendentes','tarefa_chamado_id');
        $contSolucao = $aux4::verificar_registro_chamado($id_chamado,'tb_solucao','solution_chamado_id');

        if ($contSolucao > 0)
        {
            $infoSolution = $aux4::buscar_solucao($chamado["ID"]);
            $id_solucao =  $infoSolution['id'];
            $query1 = "DELETE FROM `tb_solucao` WHERE id = $id_solucao";
            $stmt = $banco1->prepare($query1);
            $stmt->execute();
            //tem registro
        }
        if ($contPendente > 0)
        {
            $infoPendente = $aux4::buscar_id_tabelas_all($chamado["ID"],'tb_tarefa_pendentes','tb_chamados','tarefa_chamado_id');
            foreach($infoPendente as $key => $value){
                    $id_pendente = $value['ID'];
                    $query1 = "DELETE FROM `tb_tarefa_pendentes` WHERE ID = $id_pendente";
                    $stmt = $banco1->prepare($query1);
                    $stmt->execute();
                } 
        }

        $query = "DELETE FROM `tb_chamados` WHERE ID = $id_chamado";
        $stmt = $banco1->prepare($query);
        $stmt->execute();

        if($stmt->execute()){
            echo ' <div class="alert alert-success" role="alert">
                   <i class="fa-regular fa-square-check"></i> Chamado foi Excluido com Sucesso!
                    </div> ';
        }
    }
?>
    <form method="post">

        <div class="input-group_data_editar-chamado">

            <!-- Data Inical -->
            <div class="input-box">
                <label for="data_incial">Data Inicial</label>
                <input type="datetime-local" id="data_incial" name="data_incial" value= "<?php echo $data_inicial_formatada;?>" readonly>
                <span></span>
            </div>

            <!-- Data Final -->
            <div class="input-box">
                <label for="data_final">Data Final</label>
                <input type="datetime-local" id="data_final" name="data_final" value= "<?php echo $data_final_formatada;?>" readonly>
                <span></span>
            </div>
        </div>

        <div class="select_box_editar-chamado">

                <!-- Título -->
                <div class="input-box">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $chamado["titulo"];?>">
                    <span></span>
                </div>

                <!-- Descrição -->
                <div class="input-box">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" id="descricao" name="descricao" rows="6" cols="100" placeholder="Descrição do chamado..." required> <?php echo $chamado["descricao"];?> </textarea>
                    <span></span>
                </div>

                <!-- ID Status -->
                <div class="input-box">
                    <label for="id_status">Status</label>
                    <select id="id_status" name="id_status">
                        <option value="1" <?php echo ($chamado['id_status'] == 1) ? 'selected' : ''; ?>>Novo</option>
                        <option value="2" <?php echo ($chamado['id_status'] == 2) ? 'selected' : ''; ?>>Atribuido</option>
                        <option value="3" <?php echo ($chamado['id_status'] == 3) ? 'selected' : ''; ?>>Pendente</option>
                        <option value="4" <?php echo ($chamado['id_status'] == 4) ? 'selected' : ''; ?>>Solucionado</option>
                    </select>
                    <span></span>
                </div>

                <div class="input-box">
                    <label for="id_prioridade">Prioridade</label>
                    <select id="id_prioridade" name="id_prioridade">
                        <option value="1" <?php echo ($chamado['id_prioridade'] == 1) ? 'selected' : ''; ?>>Critica</option>
                        <option value="2" <?php echo ($chamado['id_prioridade'] == 2) ? 'selected' : ''; ?>>Muito Alta</option>
                        <option value="3" <?php echo ($chamado['id_prioridade'] == 3) ? 'selected' : ''; ?>>Alta</option>
                        <option value="4" <?php echo ($chamado['id_prioridade'] == 4) ? 'selected' : ''; ?>>Media</option>
                        <option value="5" <?php echo ($chamado['id_prioridade'] == 5) ? 'selected' : ''; ?>>Baixa</option>
                        <option value="6" <?php echo ($chamado['id_prioridade'] == 6) ? 'selected' : ''; ?>>Muito Baixa</option>
                    <span></span>
                   </select>
                </div>

                <!-- ID Localização -->
                <div class="input-box">
                    <label for="id_localizacao">Localização</label>
                    <select id="id_localizacao_editar_chm" name="id_localizacao_editar_chm"  onchange="updateLocalizacaoSpan()" class="js-example-basic-single" >
                            <?php
                                $localizacao = $aux4::listarSetor();
                                
                                foreach ($localizacao as $key => $value) {
                                    $selected = ($chamado['id_localizacao'] - 1 == $key) ? 'selected' : '';
                                    echo '<option value="' .$key. '" data-localizacao="' . $value['localizacao'] . '" '.$selected. '>' . $value['nome_setor'] . '</option>';
                                }
                            ?>
                    </select>
                    <span id="localizacaoSpan"></span>
                </div>

                <!-- ID Setor Atribuído -->
                <div class="input-box">
                    <label for="id_setor_atribuido">Setor Atribuído</label>
                    <select id="id_setor_atribuido" name="id_setor_atribuido"  class="js-example-basic-single" >
                            <?php
                                $setor_tribuido = $aux4::listarSetor();
                                                
                                foreach ($setor_tribuido as $key => $value) {
                                    $selected = ($chamado['id_setor_atribuido'] - 1 == $key) ? 'selected' : '';
                                    echo '<option value="' .$key.' "'.$selected.'>'.$value['nome_setor']. '</option>';
                                }
                            ?>
                    </select>
                    <span></span>
                </div>

                <!-- ID Técnico Atribuído -->
                <div class="input-box">
                    <label for="id_tec_atribuido">Técnico Atribuído</label>
                    <select id="id_tec_atribuido" name="id_tec_atribuido" class="js-example-basic-single" >
                            <?php
                                $tecnico_atribuido = $aux4::listarUsuariosTecnicos();
                                                
                                foreach ($tecnico_atribuido as $key => $value) {
                                    $selected = ($chamado['id_tec_atribuido'] == $value['id']) ? 'selected' : '';
                                    echo '<option value="' . $value['id'] . '" ' . $selected . '>' . $value['usuario'] . '</option>';
                                }
                            ?>
                    </select>
                    <span></span>
                </div>

                <!-- ID Requerente -->
                <div class="input-box">
                    <label for="id_requerente">Requerente</label>
                    <select id="id_requerente" name="id_requerente" class="js-example-basic-single" >
                            <?php
                                $req = $aux4::listarUsuarios();
                                                
                                foreach ($req as $key => $value) {
                                    $selected = ($chamado['id_requerente'] == $value['id']) ? 'selected' : '';
                                    echo '<option value=" '.$value['id'].'" '.$selected.' ">'.$value['usuario'].'</option>';
                                }
                            ?>
                    </select>
                    <span></span>
                </div>
        </div>

        
        <div class="submit-group">
            <button name="bt_alterar_cadastro"> <i class="fa-regular fa-pen-to-square"></i> Alterar Chamado </button>

            <?php if($_SESSION['permissao'] == "admin") { ?>
                <button name="bt_Fechar_chamado" onclick="return confirmarAcao('Tem certeza que deseja fechar este chamado? Essa ação pode ser alterada posteriormente. ')"> <i class="fa-regular fa-thumbs-up"></i> Fechar Chamado </button>
                <button name="bt_Excluir_chamado" onclick="return confirmarAcao('Tem certeza que deseja excluir este chamado? Todas as soluções e tarefa pendentes feitas, seram excluidas também, Deseja continurar? ')"> <i class='fa-solid fa-trash'></i> Excluir Chamado </button>
            <?php } ?>
        </div>

        </form>


    </section>


</article>

<script src="<?php echo INCLUDE_PATH;?>/painel/painel_js/editar_chamado.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#chm_menu_2").classList.toggle("chm_estilo-li");
    })
</script>
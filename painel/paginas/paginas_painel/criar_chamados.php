<?php

if(isset($_POST["bt_cadastrar_chm"]))
        {
            $data_inicio = $_POST['chm_data_inicio']; 
            $prioridade = $_POST['select_prioridade'];
            $status = $_POST['select_status']; 
            $titulo = $_POST['chm_titulo']; 
            $descricao = $_POST['chm_descricao']; 
            $localizacao = $_POST['select_localizacao'] + 1; 
            $setor_atribuido = ($_POST['select_setor'] + 1) ?? NULL; // similiar ao ISSET, se o lado esquerdo tiver valor mantem sé não preencha com ''; 
            $requerente = $_POST['select_requerente'];
            $tecnico_atribuido = $_POST['tecnico_atribuido'] ?? NULL;
            $usuario_que_criou = $_SESSION['Usuario_ID'];

            $titulo = strip_tags($titulo); // remove tag html no código.
            $descricao = strip_tags($descricao);

            $aux = new Banco();
            $banco1 = $aux->conectar();

            if($tecnico_atribuido != NULL)
            {
                $status = 2; //Atribuido.
            }

            $arr = array($titulo,$descricao,$status,$localizacao,$setor_atribuido,$tecnico_atribuido,$requerente,$data_inicio,$prioridade,$usuario_que_criou);
            $sql = "INSERT INTO `tb_chamados` VALUES (NULL,?,?,?,?,?,?,?,?,NULL,?,NULL,0,?)";
            $stmt = $banco1->prepare($sql);

            if($stmt->execute($arr)) {
                header('Location: '.INCLUDE_PATH. '/index.php');
               }    
           else{
                echo '<script> alert('.$stmt->errorInfo().') </script>';
                //print_r($stmt->errorInfo());
           }
        }
?>  
    <form class="container-chamados" id="form_chamados" method="post">

            <div class="titulo-chamado" >
                <h2>Novo Chamado</h2>
            </div>

            <section class="container-titulo">
                <div class="input-group-date">

                        <div class="input-box-titulo">
                            <label for="Data_inicio">Data-inicio:</label>
                            <input id="Data_inicio" type="datetime-local" name="chm_data_inicio">
                            <span class="error-message" id="chm_data_inicio_Error"></span>
                        </div>

                        <div class="input-box-titulo">
                            <label for="Prioridade">Prioridade:</label>
                            
                            <select id="select_prioridade" name="select_prioridade">
                                <option value="" disabled selected hidden> Selecione... </option>
                                <option value="1">Critica</option>
                                <option value="2">Muito Alta</option>
                                <option value="3">Alta</option>
                                <option value="4">Media</option>
                                <option value="5">Baixa</option>
                                <option value="6">Muito Baixa</option>
                            </select>

                            <span class="error-message" id="chm_select_prioridade_Error"></span>
                        </div>

                        <div class="input-box-titulo">
                            <label for="Status">Status:</label>
                            <select id="select_status" name="select_status">
                                <option value="" disabled selected hidden> Selecione... </option>
                                <option value="1">Novo</option>
                                <option value="2">Atribuido</option>
                            </select>
                            <span class="error-message" id="chm_select_status_Error"></span>
                        </div>

                </div>

                <div class="input-group-descricao">

                            <div class="input-box-descricao" >
                                <label for="titulo">Titulo:</label>
                                <input id="titulo" type="text" name="chm_titulo" placeholder="Titulo do chamado..." required>
                                <span class="error-message" id="chm_titulo_Error"></span>
                            </div>

                            <div class="input-box-descricao" id="input-box-descricao">
                                <label for="descricao">Descrição:</label>
                                <textarea id="descricao" type="text" name="chm_descricao" rows="6" cols="100" placeholder="Descrição do chamado..." required ></textarea>
                                <span class="error-message" id="chm_descricao_Error"></span>
                            </div>
                </div>
    
            </section>

            <section class="container-especificacao">

                <div class="input-group-especificacao-localizacao">

                    <div class="input-box">

                        <label for="localizacao">Localizacao:</label>
                        <select id="slc_localizacao" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_localizacao">
                        <option value="" disabled selected hidden> Selecione uma Localização </option>
                            <?php
                                $aux = new painel();
                                $aux = $aux->listarSetor();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key. '">'.$value['nome_setor'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_slc_localizacao_Error"></span>
                    </div>
                    
                    <div class="input-box">
                        <label for="Setor_atr">Setor atribuido:</label>
                        <select id="slc_setor" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_setor">
                        <option value="" disabled selected hidden> Selecione um Setor </option>
                            <?php
                                $aux = new painel();
                                $aux = $aux->listarSetor();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key . '">'.$value['nome_setor'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_setor_atr_Error"></span>
                    </div>
                </div>

                <div class="input-group-especificacao-usuario">

                    <div class="input-box">    
                        <label for="Requerente">Requerente:</label required>
                        <select id="slc_requerente" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_requerente">
                        <option value="" disabled selected hidden> Selecione um Requerente </option>
                        <?php
                                $aux = new painel();
                                $aux = $aux->listarUsuarios();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$value['id']. '">'.$value['usuario'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_slc_requerente_Error"></span>
                    </div>

                    <div class="input-box">
                        <label for="Tecnico_atr">Tecnico atribuido:</label>
                        <select id="slc_tecnico" class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="tecnico_atribuido">
                        <option value="" disabled selected hidden> Selecione um Tecnico </option>
                        <?php
                                $aux = new painel();
                                $aux = $aux->listarUsuariosTecnicos();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$value['id']. '">'.$value['usuario'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_titulo_Error"></span>
                    </div>
                </div>
                </section>
                    
                    <div class="submit-box">
                        <input id="bt_cadastrar_chm" type="submit" name="bt_cadastrar_chm" value="Cadastrar Chamado" >
                    </div>
    </form>

            






<article class="container-chamados">
        <form id="form_chamados" action="#">

            <div class="titulo-chamado" >
                <h2>Novo Chamado</h2>
            </div>

            <section class="container-titulo">
                <div class="input-group-date">

                        <div class="input-box-titulo">
                            <label for="Data_inicio">Data-inicio:</label>
                            <input id="Data_inicio" type="date" name="chm_data_inicio" disabled>
                            <span class="error-message" id="chm_data_inicio_Error"></span>
                        </div>

                        <div class="input-box-titulo">
                            <label for="Data_fim">Data-fim:</label>
                            <input id="Data_fim" type="date" name="chm_data_fim" required>
                            <span class="error-message" id="chm_data_fim_Error"></span>
                        </div>

                        <div class="input-box-titulo">
                            <label for="prazo">Prazo:</label>
                            <input id="prazo" type="time" name="prazo_time" step="60" disabled>
                            <span class="error-message" id="chm_data_fim_Error"></span>
                        </div>

                </div>

                <div class="input-group-descricao">
                            <div class="input-box-descricao">
                                <label for="titulo">Titulo:</label>
                                <input id="titulo" type="text" name="chm_titulo" placeholder="Titulo do chamado..." >
                                <span class="error-message" id="chm_titulo_Error"></span>
                            </div>

                            <div class="input-box-descricao">
                                <label for="descricao">Descrição:</label>
                                <textarea id="descricao" type="text" name="chm_descricao" rows="8" cols="50" placeholder="Descrição do chamado..." ></textarea>
                                <span class="error-message" id="chm_descricao_Error"></span>
                            </div>
                </div>
    
            </section>

            <section class="container-especificacao">

                <div class="input-group-especificacao-localizacao">

                    <div class="input-box">

                        <label for="localizacao">Localizacao:</label>
                        <select class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_setor">
                            <?php
                                $aux = new painel();
                                $aux = $aux->listarSetor();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key. '">'.$value['nome_setor'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="Setor_atr">Setor atribuido:</label>
                        <select class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_setor">
                            <?php
                                $aux = new painel();
                                $aux = $aux->listarSetor();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key. '">'.$value['nome_setor'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_setor_atr_Error"></span>
                    </div>
                </div>

                <div class="input-group-especificacao-usuario">

                    <div class="input-box">    
                        <label for="Requerente">Requerente:</label required>
                        <select class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_requerente">
                        <?php
                                $aux = new painel();
                                $aux = $aux->listarUsuarios();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key. '">'.$value['usuario'].'</option>';
                                }
                            ?>
                        </select>
                        <span class="error-message" id="chm_titulo_Error"></span>
                    </div>

                    <div class="input-box">
                        <label for="Tecnico_atr">Tecnico atribuido:</label>
                        <select class="js-example-basic-single" style="width:250px; height: 35px; border-radius: 5px;" name="select_atribuido">
                        <?php
                                $aux = new painel();
                                $aux = $aux->listarUsuariosTecnicos();
                                                
                                foreach ($aux as $key => $value) {
                                    echo '<option value="' .$key. '">'.$value['usuario'].'</option>';
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
    
</article>
        





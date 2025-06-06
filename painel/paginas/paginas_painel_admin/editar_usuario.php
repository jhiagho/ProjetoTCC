<article class="container-editar_usuario">

        <form id="form" method="post">
                    <div class="form-header">

                        <div class="titulo">
                            <h2>Alterar Usuario</h2>
                        </div>

                    </div> <!--form-header -->

                        <div class="input-group">

                            <div class="input-box">
                                <label for="primeiro_nome">Primeiro nome:</label>
                                <input id="primeiro_nome" type="text" name="pnome" placeholder="primeiro nome" value="<?php echo $usuario['Primeiro nome']; ?>" required>
                                <span class="error-message" id="primeiro_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="sobre_nome">Sobrenome:</label>
                                <input id="sobre_nome" type="text" name="sbnome" placeholder="sobrenome" value="<?php echo $usuario['Sobrenome']; ?>" required>
                                <span class="error-message" id="sobre_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="email">Email:</label>
                                <input id="email" type="email" name="email" placeholder="Digite seu email" value="<?php echo $usuario['email']; ?>">
                                <span class="error-message" id="email_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="telefone">Celuar:</label>
                                <input id="telefone" type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" value="<?php echo $usuario['Contato']; ?> ">
                                <span class="error-message" id="telefone_Error"></span>
                            </div>

                            <?php if($usuario['id_nivel_perm'] == 3) { 
                                $tipo = '';
                                } else {
                                    $tipo = 'disabled';
                                }
                            ?>

                            <div class="input-box">
                                <label for="Setor">Setor:</label>
                                <select class="js-example-basic-single" name="setor" id="slc_setor">
                                <?php
                                        $aux = new painel();
                                        $aux = $aux->listarSetor();
                                        
                                        foreach ($aux as $key => $value) {
                                            $selected = ($usuario['id_setor'] - 1 == $key) ? 'selected' : '';
                                            echo '<option value="' .$key. '" '.$selected. '>' . $value['nome_setor'] . '</option>';
                                        }
                                ?>
                                </select>
                            </div>
                            
                            <div class="input-box">
                                <label for="user">Usuário:</label>
                                <input id="user" type="text" name="user" placeholder="Digite seu usuario" value="<?php echo $usuario['usuario']; ?> " required>
                                <span class="error-message" id="user_Error"></span>
                                <span class="error-message" id="user_Error2"></span>
                            </div>
                        </div>  <!--input-group -->

                        <div class="submit-box">
                            <?php if($usuario['id_nivel_perm'] < 3) { ?>
                            <input id="submit_alterar_user" type="submit" name="bt_alterar" value="Alterar Usuario">
                            <?php } else { ?>
                                <button name="bt_Excluir_Usuario" onclick="return confirmarAcao('Tem certeza que deseja excluir este Usuário ? Uma vez que ação for feita não poderar mais ser desfeita!, Deseja continurar? ')"> <i class='fa-solid fa-trash'></i> Excluir Chamado </button>
                            <?php } ?>
                        </div>                
        </form>
        <?php 
            if(isset($_POST['bt_alterar']))
            {
                $pnome = $_POST['pnome'];
                $sbnome = $_POST['sbnome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $setor = $_POST['setor'] + 1;
                $user = $_POST['user'];

                $banco4 = Banco::conectar();
                $query1 = "UPDATE `tb_usuarios` SET `Primeiro nome` = '$pnome' , `Sobrenome` = '$sbnome' , `Contato` = '$telefone' , `id_setor` = '$setor' , 
                            `usuario` = '$user' , `email` = '$email'  WHERE `tb_usuarios`.`id` = $id_usuario";
                $stmt4 = $banco4->prepare($query1);
                        
            if($stmt4->execute()){
                echo '<div class="alert alert-success" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i> Usuário Alterado com sucesso. Aguarde 3 segundos para a mudançã sera realizada! </div>';
                 header("refresh:3;url=".INCLUDE_PATH."/?editar_usuario=".$id_usuario);             
                } else {
                echo '<div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i> Algo deu errado! Contate o Desenvolver do Sistema. </div>';
                }
            }
        
        ?>
        <hr>

        <?php if($usuario['id_nivel_perm'] < 3) { ?>
                <div class="form-header">

                <div class="titulo">
                    <h2>Alterar Senha</h2>
                </div>

                </div> <!--form-header -->

                <form id='form_senha' method="post">

                    <div class="group-password">
                            <div class="input-box">
                                <label for="password">Senha Aniga:</label>
                                <input id="antiga_password" type="password" name="antiga-senha" placeholder="Digite sua senha" >
                                <span class="error-message" id="password_Error"></span>
                                <img id="togglePassword3" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <div class="input-box">
                                <label for="password">Nova Senha:</label>
                                <input id="password_alterar" type="password" name="senha" placeholder="Digite sua senha" >
                                <span class="error-message" id="password_alterar_Error"></span>
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua Nova Senha:</label>
                                <input id="confirmpassword_alterar" type="password" name="cofsenha" placeholder="Confirme sua senha" >
                                <span class="error-message" id="confirmpassword_alterar_Error"></span>
                                <img id="togglePassword2" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <div class="input-box">
                                <input id="submit_Verificar" type="submit" name="Verificar_senha" value="Verificar">
                            </div>

                    </div>

                </form>
                <?php }

                if(isset($_POST['Verificar_senha']))
                {
                    $senha_antiga = strip_tags($_POST['antiga-senha']);
                    $nova_senha = strip_tags($_POST['senha']);
                    $conf_senha = strip_tags($_POST['cofsenha']);

                    $senha_decodificda = base64_decode($usuario["senha"]);
                    // echo $senha_decodificda;

                    if($senha_antiga == $senha_decodificda){
                        //Alterar Senha!!
                        $senha_codificada = base64_encode($nova_senha);
                        $banco4 = Banco::conectar();
                        $query1 = "UPDATE `tb_usuarios` SET `senha` = '$senha_codificada' WHERE `tb_usuarios`.`id` = $id_usuario";
                        $stmt4 = $banco4->prepare($query1);
                        
                        if($stmt4->execute()){
                            echo '<div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i> Senha Alterada com sucesso. Aguarde 3 segundos para a mudança sera realizada! </div>';
                             header("refresh:3;url=".INCLUDE_PATH."/?editar_usuario=".$id_usuario); 

                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i> Algo deu errado! Contate o Desenvolver do Sistema. </div>';
                        }

                    } else {
                        //Erro de Senha!!
                        echo '
                        <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"> Não foi possivel Alterar a Senha! </h4>
                        <p> A sua senha senha antiga tem que conferer com a que esta registrada no Banco!</p>
                        </div>';
                    }
                    
                }

                ?>
                <hr>

                <?php if($usuario['id_nivel_perm'] == 3) { ?>

                <div class="form-header">
                    <div class="titulo">
                        <h2>Alterar Permissão</h2>
                    </div>
                </div> <!--form-header -->
                
                <form id='formPermissao' name='formPermissao' method='post'>
                    <div class="group-password">
                        <div class="input-box">
                                <label for="permissao">Permissão:</label>
                                <select name="permissao" id="slc_permissao" <?php echo $tipo ?> >
                                    <option value="1" <?php echo ($usuario['id_nivel_perm'] == 1) ? 'selected' : ''; ?>>padrao</option>
                                    <option value="2" <?php echo ($usuario['id_nivel_perm'] == 2) ? 'selected' : ''; ?>>Técnico</option>
                                    <option value="3" <?php echo ($usuario['id_nivel_perm'] == 3) ? 'selected' : ''; ?>>Admin</option>
                                </select>
                            <span class="error-message" id="telefone_Error"></span>
                        </div>

                        <div class="submit-box">
                            <input id="submit_alterar_permissao" type="submit" name="bt_alterar_permissao" value="Alterar Permissão">
                        </div>  
                    </div>
                </form>
                <?php  
                if(isset($_POST['bt_alterar_permissao']))
                {
                    $permissao = strip_tags($_POST['permissao']);

                    $banco4 = Banco::conectar();
                    $query1 = "UPDATE `tb_usuarios` SET `id_nivel_perm` = '$permissao' WHERE `tb_usuarios`.`id` = $id_usuario";
                    $stmt4 = $banco4->prepare($query1);
                    
                    if($stmt4->execute()){
                        echo '<div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i> Permissão Alterada com sucesso. Aguarde 3 segundos para a mudança sera realizada! </div>';
                         header("refresh:3;url=".INCLUDE_PATH."/?editar_usuario=".$id_usuario); 

                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i> Algo deu errado! Contate o Desenvolver do Sistema. </div>';
                    }
                } 
                }
                ?>



</article> <!--container-cadastro-->
<script>

function confirmarAcao(mensagem) {
        return confirm(mensagem);
    }

document.addEventListener("DOMContentLoaded", function() {

    $(function(){
        $('#telefone').mask('(00)00000-0000');

        $(document).ready(function() {
            // Inicializa o select2
            $('.js-example-basic-single').select2();
        
            // Estiliza o contorno e o fundo da caixa de seleção
            $('.select2-container--default .select2-selection--single').css({
                'border': 'none',
                'border-radius': '10px',
                'box-shadow': '1px 1px 6px #0000001c',
                'height': '50px'
            });
        
            // Ajusta o alinhamento vertical do texto e o padding
            $('.select2-container--default .select2-selection--single .select2-selection__rendered').css({
                'line-height': '50px',
                'padding-left': '10px',
                'padding-right': '10px',
                'top': '0'
            });
        
            // Estiliza e ajusta a posição do ícone de seta para baixo
            $('.select2-container--default .select2-selection--single .select2-selection__arrow').css({
                'height': '50px'
            });
        });
    });

});

</script>


<!---select2 e jquery ------------------------------------------------------------------------------------->




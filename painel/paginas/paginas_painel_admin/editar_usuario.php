<article class="container-editar_usuario">
<?php 
      $id_usuario = $_GET['editar_usuario'];
      echo $id_usuario;

      $banco = Banco::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE `id` = '$id_usuario' ");
      $banco->execute();
      $usuario = $banco->fetch(PDO::FETCH_ASSOC);
      print_r($usuario);
?>

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

                            <?php if($_SESSION['permissao'] == 'admin') { 
                                $tipo = '';
                                } else {
                                    $tipo = 'disabled';
                                }
                            ?>
                            <div class="input-box">
                                <label for="permissao">Permissao:</label>
                                <select class="js-example-basic-single" name="permissao" id="slc_permissao" <?php echo $tipo ?> >
                                    <option value="1" <?php echo ($usuario['id_nivel_perm'] == 1) ? 'selected' : ''; ?>>padrao</option>
                                    <option value="2" <?php echo ($usuario['id_nivel_perm'] == 2) ? 'selected' : ''; ?>>Técnico</option>
                                    <option value="3" <?php echo ($usuario['id_nivel_perm'] == 3) ? 'selected' : ''; ?>>Admin</option>
                                </select>
                                <span class="error-message" id="telefone_Error"></span>
                            </div>

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
                            <input id="submit_alterar_user" type="submit" name="bt_alterar" value="Alterar Usuario">
                            <input id="submit_excluir_user" type="submit" name="bt_alterar_user" value="Excluir Usuário">
                        </div>                
        </form>
        <hr>

        <?php if($_SESSION['permissao'] == 'admin') { ?>
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
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <div class="input-box">
                                <label for="password">Nova Senha:</label>
                                <input id="password" type="password" name="senha" placeholder="Digite sua senha" >
                                <span class="error-message" id="password_Error"></span>
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua Nova Senha:</label>
                                <input id="confirmpassword" type="password" name="cofsenha" placeholder="Confirme sua senha" >
                                <span class="error-message" id="confirmpassword_Error"></span>
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

                    echo $senha_antiga;
                    echo $nova_senha;
                    echo $conf_senha;

                    
                }

                ?>

</article> <!--container-cadastro-->
<script>

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




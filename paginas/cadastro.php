<?php  
include('/xampp/htdocs/ProjetoTCC/config.php');
include('/xampp/htdocs/ProjetoTCC/classes/painel.php');

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://localhost/ProjetoTCC/css/cadastro.css">
    </head>
    <body>
        <article class="container-cadastro">
                <section class="form-image">
                    <img src="http://localhost/ProjetoTCC/imagens/undraw_sign_up_n6im.svg">
                </section> <!--form-img -->
                <section class="form-cadastro">

                    <form id="form" method="post">
                        <div class="form-header">
                            <div class="titulo">
                                <h2>Cadastre-se</h2>
                            </div>

                            <div class="voltar-button">
                                <button> <a href="http://localhost/ProjetoTCC/login.php"> Voltar </a> </button>
                            </div>
                        </div> <!--form-header -->

                        <div class="input-group">

                            <div class="input-box">
                                <label for="primeiro_nome">Primeiro nome:</label>
                                <input id="primeiro_nome" type="text" name="pnome" placeholder="Digite seu primeiro nome" >
                                <span class="error-message" id="primeiro_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="sobre_nome">Sobrenome:</label>
                                <input id="sobre_nome" type="text" name="sbnome" placeholder="Digite seu sobrenome" >
                                <span class="error-message" id="sobre_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="email">Email:</label>
                                <input id="email" type="email" name="email" placeholder="Digire seu email" >
                                <span class="error-message" id="email_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="telefone">Celular para contato:</label>
                                <input id="telefone" type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" >
                                <span class="error-message" id="telefone_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="Setor">Setor:</label>
                                <select name="setor">
                                <?php
                                        $aux = new painel();
                                        $aux = $aux->listarSetor();
                                        
                                        foreach ($aux as $key => $value) {
                                            echo '<option value="' .$key. '">'.$value['nome_setor'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <!-- permissão automaticamaticamente sera definido por padrao, precisa ser alterado posteriomente na edição do personagem, apenas admin tem essa opção -->

                            <!-- <div class="input-box">
                                <label for="Permissão">Permissão:</label>
                                <select name="perm">
                                <?php
                                        // $aux = new painel();
                                        // $aux = $aux->listarPermissao();
                                        
                                        // foreach ($aux as $key => $value) {
                                        //     echo '<option value="'.$key. '">'.$value['permissao'].'</option>';
                                        // }
                                    ?>
                                </select>
                            </div> -->
                            
                            <div class="input-box">
                                <label for="user">Usuário:</label>
                                <input id="user" type="text" name="user" placeholder="Digite seu usuario" >
                                <span class="error-message" id="user_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="password">Senha:</label>
                                <input id="password" type="password" name="senha" placeholder="Digite sua senha" >
                                <span class="error-message" id="password_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua Senhar:</label>
                                <input id="confirmpassword" type="password" name="cofsenha" placeholder="Confirme sua senha" >
                                <span class="error-message" id="confirmpassword_Error"></span>
                            </div>
                        </div> <!--input-group -->

                        <div class="submit-box">
                            <input id="submit" type="submit" name="bt_cadastrar" value="Cadastrar" >
                        </div>                
                    </form>

                    <?php
                    if(isset($_POST['bt_cadastrar']))
                    {
                        $pnome = $_POST['pnome'];
                        $sbnome = $_POST['sbnome'];
                        $email = $_POST['email'];
                        $telefone = $_POST['telefone'];
                        $setor = $_POST['setor'];
                        $senha = $_POST['senha'];
                        $user = $_POST['user'];

                        $aux = new painel();
                        $setores = $aux->listarSetor();
                        $textoSetorSelecionado = $setores[$setor]['nome_setor'];

                        $aux = new painel();               
                        if ($aux->verificar_user($user)) {
                            echo  '<span class="error-message2">Formulario não foi enviado pois o usuario '.$user.' já existe. Insira os dados novamente.</span>';
                            echo  '<span class="error-message2">Sugestão: '.$pnome. '.' .$sbnome.'</span>';
                        } else {
                            echo $pnome. " - ";
                            echo $sbnome. " - ";	
                            echo $email. " - ";
                            echo $telefone. " - ";
                            echo $setor. " - ";
                            echo $senha. " - ";
                            echo $user. " - ";
                            echo "\n texto do setor: " .$textoSetorSelecionado;
                        }
                    }
                    ?>

                </section> <!--form-cadastro -->
        </article> <!--container-cadastro-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
            <script src="http://localhost/ProjetoTCC/js/script-cadastro.js" ></script>
            <script src="http://localhost/ProjetoTCC/ajax/ajax_verificar_user.js"></script>
            <!-- jQuery -->
            
            <!-- jQuery Mask Plugin -->
            

    </body>
</html>

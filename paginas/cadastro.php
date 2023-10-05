<?php
//include('/xampp/htdocs/ProjetoTCC/config.php');
include('/xampp/htdocs/ProjetoTCC/classes/painel.php');

?>

<?php
                if(isset($_POST['bt_cadastrar']))
                {
                    $pnome = $_POST['pnome'];
                    $sbnome = $_POST['sbnome'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];
                    $setor = $_POST['setor'] + 1; // para ser inserido no banco precisa ser adicionado mais um.
                    $senha = $_POST['senha'];
                    $user = $_POST['user'];

                    $cripto = sha1($senha);
                    //echo $cripto;	

                    $aux = new Banco();
                    $banco = $aux->conectar()->prepare("INSERT INTO `tb_usuarios` VALUES (NULL,?,?,?,?,?,?,?,?)");
                    $banco->execute(array($pnome,$sbnome,$telefone,$setor,$user,$cripto,$email,1));
                    
                    header('Location: '.INCLUDE_PATH. '/index.php?sucesso=true');
                }

                ?>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>/css/cadastro.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!---select2 e jquery ------------------------------------------------------------------------------------->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <!-- <script src="http://localhost/ProjetoTCC/ajax/ajax_verificar_user.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        <article class="container-cadastro">
                <section class="form-image">
                    <img src="<?php echo INCLUDE_PATH;?>/imagens/undraw_sign_up_n6im.svg">
                </section> <!--form-img -->
                <section class="form-cadastro">

                    <form id="form" method="post">
                        <div class="form-header">
                            <div class="titulo">
                                <h2>Cadastre-se</h2>
                            </div>

                            <div class="voltar-button">
                                <button> <a href="<?php echo INCLUDE_PATH;?>/login.php"> Voltar </a> </button>
                            </div>
                        </div> <!--form-header -->

                        <div class="input-group">

                            <div class="input-box">
                                <label for="primeiro_nome">Primeiro nome:</label>
                                <input id="primeiro_nome" type="text" name="pnome" placeholder="primeiro nome" >
                                <span class="error-message" id="primeiro_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="sobre_nome">Sobrenome:</label>
                                <input id="sobre_nome" type="text" name="sbnome" placeholder="sobrenome" >
                                <span class="error-message" id="sobre_nome_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="email">Email:</label>
                                <input id="email" type="email" name="email" placeholder="Digite seu email" >
                                <span class="error-message" id="email_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="telefone">Celular:</label>
                                <input id="telefone" type="text" name="telefone" placeholder="(xx)xxxxx-xxxx" >
                                <span class="error-message" id="telefone_Error"></span>
                            </div>

                            <div class="input-box">
                                <label for="Setor">Setor:</label>
                                <select class="select_2" name="setor" id="select_2">
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
                                <label for="user">Usuário:</label>
                                <input id="user" type="text" name="user" placeholder="Digite seu usuario" >
                                <span class="error-message" id="user_Error"></span>
                                <span class="error-message" id="user_Error2"></span>
                            </div>

                            <div class="input-box">
                                <label for="password">Senha:</label>
                                <input id="password" type="password" name="senha" placeholder="Digite sua senha" >
                                <span class="error-message" id="password_Error"></span>
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <!-- <div class="input-box">
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div> -->

                            
                            <div class="input-box">
                                <label for="confirmpassword">Confirme sua Senhar:</label>
                                <input id="confirmpassword" type="password" name="cofsenha" placeholder="Confirme sua senha" >
                                <span class="error-message" id="confirmpassword_Error"></span>
                                <img id="togglePassword2" src="/ProjetoTCC/imagens/eye.svg">
                            </div>

                            <!-- <div class="input-box">
                                <img id="togglePassword" src="/ProjetoTCC/imagens/eye.svg">
                            </div>
                             -->
                        </div> <!--input-group -->

                        <div class="submit-box">
                            <input id="submit" type="submit" name="bt_cadastrar" value="Cadastrar" >
                        </div>                
                    </form>

                </section> <!--form-cadastro -->
        </article> <!--container-cadastro-->
            <!-- jQuery -->
            
            <script src="<?php echo INCLUDE_PATH;?>/js/script-cadastro.js" ></script>
            <!-- jQuery Mask Plugin -->
            
    </body>
</html>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solve Link</title>
        <meta name="description" content="Solve Link, controle de tarefas em TI">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="TI,tarefa,task">
        <link rel="stylesheet" href="">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        
        <!-- Carregamento dos es -->
        <link href="<?php echo INCLUDE_PATH;?>/css/style.css" rel="stylesheet" >
        <link href="<?php echo INCLUDE_PATH;?>/fontawesome/css/all.min.css" rel="stylesheet" >

    </head>
      
    <body>
        <article class="login">
      
            <div class="center">
                <section class="box-login">
                    <section class="box-image">
                        <div class="circuferencia-box-image">
                            <i class="fa-solid fa-user"></i>
                        </div> <!--circuferencia-->
                    </section><!--box-image-->

                    <div class="titulo">
                        <h2> Faça seu Login</h2>
                    </div>
                    <form method="post">
                        <div class="input-text">
                            <div class="input-box">
                                <label> Usuário:</label>      
                                <input type="text" name="usuario" placeholder="usuário.. " />
                            </div>

                            <div class="input-box">
                                <div>
                                    <label> Senha: </label>
                                    <a href="">Esqueceu a senha ?</a> 
                                </div>
                                <input type="password" name="senha" placeholder="senha.. " />
                            </div>

                            <!-- <h1> <a href="">Esqueceu a senha ?</a> </h1> -->

                        </div><!--box-text-->
                        <div class="input-submit">
                            <input type="submit" name= "login" value="Login!" />
                            <input type="submit" name= "cadastro" value="Cadastrar!" />
                        </div>
                    </form>
                    <?php

                        if(isset($_POST['login']))
                        {
                            $user = $_POST['usuario']; 
                            $senha = $_POST['senha'];
                            $cripto = sha1($senha);

                            //conectar com o banco e procurar se o usuario ou senha esta presente no banco.
                            $sql = Banco::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE usuario = '$user' AND senha = '$cripto'");
                            $sql->execute();
                            $info = $sql->fetch();
                            
                            if($sql->rowCount() == 1){
                                $_SESSION['login'] = true;
                                $_SESSION['usuario'] = $user;
                                $_SESSION['senha'] = $senha;
                                $_SESSION['permissao'] = painel::nome_permissao($info['id_nivel_perm']);
                                $_SESSION['setor'] = painel::buscar_nome_setor($user);

                                //se o usuario e a senha estiver presente no banco, redirecionar para a pagina inicial.
                                header('Location: '.INCLUDE_PATH. '/index.php');
                            } else {
                                //não foi logado no sistema.
                                echo '<div class="alert alert-danger" role="alert">
                                      <i class="fa-solid fa-circle-exclamation"></i> Usuario ou senha Incorreta! </div>';
                            } 
                        }
                    ?>
                </section>
                    <?php
            
                    if(isset($_GET['sucesso']) && $_GET['sucesso'] == true)
                        {
                            echo '<script type="text/javascript">
                            window.onload = function () { alert("Cadastro Realizado com sucesso. Prossiga para tela de login com seu usuario e senha criadogi"); }
                            </script>'; 
                            unset($_GET['sucesso']);
                        } 
                    ?>
            </div> <!--center-->
        </article><!--box-login-->
        
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>
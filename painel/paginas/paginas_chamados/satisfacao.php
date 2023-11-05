<section class="header_editar_descricao">
        <h1> Satisfação </h1>
</section>

<?php if( ($chamado2['fechamento'] == '1' && $chamado2['id_requerente'] == $_SESSION['Usuario_ID']) || ($_SESSION['permissao'] == 'admin') ) { ?>
<?php if( $chamado2['status_avaliacao'] == '0') { ?>

<section class="container_avaliacao">
    <form method="post">
            <input type="hidden" name="id_chamado" value="<?php echo $chamado2['ID'];?>">     
            <h1> Em uma escala de 1 a 5 estrelas, como voçê avaliaria o serviço prestado no Chamado ? </h1>

            <div class="star-rating">
                <input type="radio" id="star5" name="avaliacao" value="5" /><label for="star5" title="Excelente"><i class="fa fa-star"></i><span>Excelente</span></label>
                <input type="radio" id="star4" name="avaliacao" value="4" /><label for="star4" title="Bom"><i class="fa fa-star"></i><span>Bom</span></label>
                <input type="radio" id="star3" name="avaliacao" value="3" /><label for="star3" title="Regular"><i class="fa fa-star"></i><span>Regular</span></label>
                <input type="radio" id="star2" name="avaliacao" value="2" /><label for="star2" title="Ruim"><i class="fa fa-star"></i><span>Ruim</span></label>
                <input type="radio" id="star1" name="avaliacao" value="1" /><label for="star1" title="Muito Ruim"><i class="fa fa-star"></i><span>Muito Ruim</span></label>
            </div> 

            <div class="input-box">
                    <label for="descricao">Comentário Adicional</label>
                        <textarea type="text" id="descricao" name="avaliacao_descricao" rows="6" cols="100" placeholder="Digite um Comentário..." required> </textarea>
                    <span></span>
            </div>

            <div class="submit-group">
                <button name="bt_avaliar" id="bt_avaliar"> <i class="fa-solid fa-star"></i> Enviar Avaliação </button>
            </div>
    </form>

    <?php 
        if(isset($_POST['bt_avaliar']))
        {   
            $descricao_avaliacao = strip_tags($_POST['avaliacao_descricao']);
            $estrelas = $_POST['avaliacao'];
            $id_chamado = $chamado2['ID'];
            $id_requerente = $chamado2['id_requerente'];

            $banco5 = Banco::conectar();
            $arr = array($estrelas,$descricao_avaliacao,$id_chamado,$id_requerente);
            $query = "INSERT INTO `tb_avaliacao` VALUES (NULL,?,?,?,?)";
            $stmt = $banco5->prepare($query);

            if($stmt->execute($arr)) {

                $sql = "UPDATE `tb_chamados` SET `status_avaliacao` = '1' WHERE `tb_chamados`.`ID` = $id_chamado;";
                $stmt = $banco5->prepare($sql);
                $stmt->execute();

                header('Location: '.INCLUDE_PATH. '/painel/paginas/paginas_chamados/index.php?chm='.$id_chamado);
                ob_end_flush();

               }    
           else{
                echo '<script> alert('.$stmt->errorInfo().') </script>';
                //print_r($stmt->errorInfo());
           }
        }
    }    
    ?>
<?php } if( $chamado2['status_avaliacao'] == '1' && ($chamado2['id_tec_atribuido'] == $_SESSION['Usuario_ID'] || $chamado2['id_requerente'] == $_SESSION['Usuario_ID'] || ($_SESSION['permissao'] == 'admin')) ) { 
           $info = painel::buscar_id_tabelas_all($chamado2["ID"],'tb_avaliacao','tb_chamados','avaliacao_chm_id');
           $avaliacao_info = $info[0];
?>

    <section class="avaliacao-box">
        <h1>Satisfação: <?php echo $avaliacao_info['avaliacao'];?> <i class="fa-regular fa-star"></i> </h1>
        <p> <?php echo $avaliacao_info["comentario"]?> </p>
        <span><i>Responsável: </i> <?php echo painel::buscar_id_tabelas($avaliacao_info["avaliacao_responsavel"],'usuario','tb_avaliacao','tb_usuarios','avaliacao_responsavel');?> </span>
    </section>

</section>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"> Problema ao Avaliar esse Chamado! </h4>
            <p> Apenas chamados solucionados e Aprovados por um usuario nivel admin podem ser availiados e visualizados.</p>
            <hr>
            <p class="mb-0"> Importante!! Só ira aparecer o processo de Avaliação ser o requerente desse chamado estiver logado no sistema. </p>
    </div>
<?php } ?>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#chm_menu_6").classList.toggle("chm_estilo-li");
    })
</script>
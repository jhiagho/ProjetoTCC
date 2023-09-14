<h1>Teste estou na pagina meu_chamados</h1>
<?php
    echo $_SESSION['usuario']. '<hr>';
    echo $_SESSION['permissao']. '<hr>';
    echo $_SESSION['setor']. '<hr>';
?>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_2").classList.toggle("estilo-li");
    })
</script>
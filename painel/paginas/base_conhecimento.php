<h1>Teste estou na pagina de BASE DE CONHECIMENTO</h1>
<h1>EM DESENVOLVIMENTO..</h1>
<?php
    echo $_SESSION['usuario']. '<hr>';
    echo $_SESSION['permissao']. '<hr>';
    echo $_SESSION['setor']. '<hr>';
?>

<script>
    window.addEventListener("DOMContentLoaded", ()=>{
        document.querySelector("#linha_menu_4").classList.toggle("estilo-li");
    })
</script>
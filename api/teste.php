<?php
    include('../classes/painel.php');
    echo json_encode(painel::verificar_user(""));
?>
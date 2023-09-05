
<?php
include('../classes/painel.php'); // Inclua sua configuração de conexão com o banco de dados

//$aux = new painel();
$username = $_POST['user'];
$response = ['exists' => false];

if(painel::verificar_user($username)) {
    $response['exists'] = true;
}
    die(json_encode($response));
?>

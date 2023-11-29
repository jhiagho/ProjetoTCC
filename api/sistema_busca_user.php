<?php 

include('/xampp/htdocs/ProjetoTCC/classes/painel.php'); // inclua seu arquivo de conexão

$column = $_GET['column']; // obtenha o valor do primeiro select
$options = [];

// column_user 4 e 5
$banco = new Banco();
$painel = new Painel();

if ($column == "4") { // para setor_atribuido e localizacao
    $conexao1 = $banco::conectar();
    $query = "SELECT id, nome_setor FROM `tb_setor`";
    $result = $conexao1->prepare($query);
    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $options[] = [
            'value' => $row['id'],
            'text' => $row['nome_setor']
        ];
    }
}
if ($column == "5") { // para setor_atribuido e localizacao
    $conexao1 = $banco::conectar();
    $query = "SELECT id, permissao FROM `tb_permissao`";
    $result = $conexao1->prepare($query);
    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $options[] = [
            'value' => $row['id'],
            'text' => $row['permissao']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($options);

?>

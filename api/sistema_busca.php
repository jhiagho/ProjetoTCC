<?php 
    include('/xampp/htdocs/ProjetoTCC/classes/painel.php'); // inclua seu arquivo de conexão

    $column = $_GET['column']; // obtenha o valor do primeiro select
    $options = [];
    
    $banco = new Banco();
    $painel = new Painel();
    $conexao1 = $banco::conectar();
    
    if ($column == "3" || $column == "4") { // para setor_atribuido e localizacao
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

    if ($column == "5") { // para requrente
        $conexao1 = $banco::conectar();
        $query = "SELECT id, usuario FROM `tb_usuarios`";
        $result = $conexao1->prepare($query);
        $result->execute();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options[] = [
                'value' => $row['id'],
                'text' => $row['usuario']
            ];
        }
    }
    if ($column == "6") { // para setor_atribuido
        $conexao1 = $banco::conectar();
        $query = "SELECT id, usuario FROM `tb_usuarios` WHERE `id_nivel_perm` = '2'";
        $result = $conexao1->prepare($query);
        $result->execute();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options[] = [
                'value' => $row['id'],
                'text' => $row['usuario']
            ];
        }
    }

    if ($column == "7") { // para status
        $conexao1 = $banco::conectar();
        $query = "SELECT `id`, `status` FROM `tb_status_chamados`";
        $result = $conexao1->prepare($query);
        $result->execute();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options[] = [
                'value' => $row['id'],
                'text' => $row['status']
            ];
        }
    }

    if ($column == "8") { // para prioridade
        $conexao1 = $banco::conectar();
        $query = "SELECT `id`, `prioridade` FROM `tb_prioridades_chamados`";
        $result = $conexao1->prepare($query);
        $result->execute();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options[] = [
                'value' => $row['id'],
                'text' => $row['prioridade']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($options);



?>
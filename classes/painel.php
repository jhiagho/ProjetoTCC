<?php
    include_once('C:/xampp/htdocs/ProjetoTCC/config.php');
    include('banco.php');
    /**
     * Class painel
     */
    class painel 
    {

        public static function logado(){
            // Verifica se exite a sessão login.
           if(isset($_SESSION['login'])) return true; 
              else false;
        }
        public static function formatarData($data){
            $dataObjeto = DateTime::createFromFormat('Y-m-d H:i:s', $data);
            $dataFormatada = $dataObjeto->format('d-m-Y H:i:s'); // Formata a data no formato desejado
            return $dataFormatada;
        }

        public static function loggout(){
            session_destroy();
            header('Location: ' .INCLUDE_PATH);
        }
        
        // função dos bancos de dados.
        public static function listarPermissao(){
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_permissao`");
            $banco->execute();
            $info = $banco->fetchAll();
            
            return $info;
        }

        public static function listarSetor(){
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_setor`");
            $banco->execute();
            $info = $banco->fetchAll();
            
            return $info;
        }

        public static function listarUsuariosTecnicos(){
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE `id_nivel_perm` = '2' ");
            $banco->execute();
            $info = $banco->fetchAll();
            
            return $info;
        }

        public static function listarUsuarios(){
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE `id_nivel_perm` <= '2' ");
            $banco->execute();
            $info = $banco->fetchAll();
            
            return $info;
        }

        public static function nome_permissao($permissao){
            $array = [ '1' => 'padrao',
            '2' => 'tecnico',
            '3' => 'admin'];

            return $array[$permissao];
        }

        public static function buscar_nome_setor($user){
            $banco = Banco::conectar()->prepare("SELECT nome_setor FROM tb_setor INNER JOIN tb_usuarios ON tb_setor.id = tb_usuarios.id_setor AND usuario = '$user'");
            $banco->execute();
            $info = $banco->fetch();
            return $info[0];
        }

        public static function verificar_user($user){
            $banco = Banco::conectar()->prepare("SELECT COUNT(*) as count FROM tb_usuarios WHERE usuario = '$user'");
            $banco->execute();
            $info = $banco->fetch();

            if($info['count'] > 0){
                return true;
            }
            return false;
        }

        public static function listarChamados(){
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_chamados`");
            $banco->execute();
            $info = $banco->fetchAll(PDO::FETCH_ASSOC);
            
            return $info;
        }

        public static function getProximoRegistro($idAtual) {
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_chamados` WHERE `ID` < :idAtual ORDER BY `ID` DESC LIMIT 1");
            $banco->bindParam(':idAtual', $idAtual, PDO::PARAM_INT);
            $banco->execute();

            $info = $banco->fetch();

            if($info)
                return $info["ID"];
            else
                return false;
        }
        
        public static function getRegistroAnterior($idAtual) {
            $banco = Banco::conectar()->prepare("SELECT * FROM `tb_chamados` WHERE `ID` > :idAtual ORDER BY `ID` ASC LIMIT 1");
            $banco->bindParam(':idAtual', $idAtual, PDO::PARAM_INT);
            $banco->execute();

            $info = $banco->fetch();

            if($info)
                return $info["ID"];
            else
                return false;
        }


        public static function BuscarChamados($id){
            $banco = Banco::conectar();
            $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.ID = '$id'";
            $stmt = $banco->prepare($quary);
            $stmt->execute();

            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            return $info ? [$info] : [];

            //A fazer, modo de busca.
        }
        public static function PesquisarChamados($column, $detail) {
            $banco = Banco::conectar();
           
            if($column == 0){
                $result = self::BuscarChamados($detail);
                return $result ? $result : [];
            }

            if ($column > 0 && $column < 3) 
            {
                if($column == 1) {
                    $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.titulo LIKE :termo ";
                }
                if($column == 2) {
                    $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.descricao LIKE :termo ";
                }
                $stmt = $banco->prepare($quary);
                $stmt->execute(['termo' => "%$detail%"]);

                $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $info ? $info : [];
            }
            if($column > 2) {

                    if($column == 3){
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_setor_atribuido = '$detail'";
                    }
                    if($column == 4){
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_localizacao = '$detail'";
                    }
                    if($column == 5){
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_requerente = '$detail'";
                    }
                    if($column == 6){
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_tec_atribuido = '$detail'";
                    }
                    if($column == 7){
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_status = '$detail'";
                    }
                    if($column == 8){    
                        $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id_prioridade = '$detail'";       
                    }
                    $stmt = $banco->prepare($quary);
                    $stmt->execute();

                    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $info ? $info : [];
            }
        }

        public static function buscar_id_tabelas($id,$nome_tipo,$tabela_original,$tabela_destino,$tipo) {
                $banco = Banco::conectar();
                $quary = "SELECT `$nome_tipo` FROM `$tabela_destino` INNER JOIN `$tabela_original` ON $tabela_destino.id = $tabela_original.$tipo AND $tabela_destino.id = '$id'";
                $stmt =$banco->prepare($quary);
                $stmt->execute();

                $info = $stmt->fetch();
                return $info[0];
        }

        public static function buscar_id_tabelas_all($id,$tabela_original,$tabela_destino,$tipo) {
            $banco = Banco::conectar();
            $quary = "SELECT $tabela_original.* FROM `$tabela_destino` INNER JOIN `$tabela_original` ON $tabela_destino.id = $tabela_original.$tipo AND $tabela_destino.id = '$id'";
            $stmt = $banco->prepare($quary);
            $stmt->execute();

            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $info;
    }

        public static function buscar_solucao($id) {
            $banco = Banco::conectar();
            $quary = "SELECT tb_solucao.* FROM `tb_solucao` INNER JOIN `tb_chamados` ON solution_chamado_id = tb_chamados.ID AND tb_chamados.ID = '$id' ";
            $stmt = $banco->prepare($quary);
            $stmt->execute();
            $info = $stmt->fetch(PDO::FETCH_ASSOC);

            return $info;
        }

        public static function verificar_registro_chamado($id_chamado,$tabela_verificar,$atributo){
            $banco = Banco::conectar();
            $quary = "SELECT COUNT(*) as total FROM $tabela_verificar WHERE $atributo = $id_chamado;";
            $stmt = $banco->prepare($quary);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado['total'];
        }

        // public static function buscar_pendente($id){
        //     $banco = Banco::conectar();
        //     $quary = "SELECT * FROM `tb_tarefa_pendentes` INNER JOIN";
        // }


    }

?>
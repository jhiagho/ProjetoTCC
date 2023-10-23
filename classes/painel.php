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

        public static function BuscarChamados($id){
            $banco = Banco::conectar();
            $quary = "SELECT * FROM `tb_chamados` WHERE tb_chamados.id = '$id'";
            $stmt = $banco->prepare($quary);
            $stmt->execute();

            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            return $info;

            //A fazer, modo de busca.
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

        // public static function buscar_pendente($id){
        //     $banco = Banco::conectar();
        //     $quary = "SELECT * FROM `tb_tarefa_pendentes` INNER JOIN";
        // }


    }

?>
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

        public static function loggout(){
            session_destroy();
            header('Location: ' .INCLUDE_PATH);
        }
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
    }
    

?>
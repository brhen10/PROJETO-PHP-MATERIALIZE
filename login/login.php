<?php

require_once('conexao.php');
session_start();

class Login {

    private static $instance;

    public static function getInstance() {

        if (is_null(self::$instance)) {
            self::$instance = new Login();
        }
        return self::$instance;
    }

    public function inserir($login, $senha) {

        $sql = "INSERT INTO usuarios (login, senha) VALUES (:login,:senha)";
        global $conexao;
        $st = $conexao->prepare($sql);
        $dados = [
            ':login' => htmlentities($login),
            ':senha' => sha1($senha)
        ];
        try {
            $check = $st->execute($dados);
            return $check;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function autenticar($login, $senha) {
        
        global $conexao;
        $sql = "SELECT senha FROM usuarios where (login=:login)";

        $st = $conexao->prepare($sql);
        $dados = [
            ':login' =>$login,
        ];

        if ($st->execute($dados)) {
            if($st->rowCount()==1){
            list($retorno) = $st->fetchAll();
            return (sha1($senha)===$retorno['senha']);
            }
        }
        return false;
    }

    public function guardaDadosEmSessao($login) {
        $_SESSION['usuario_autenticado'] = [
            'login' => $login, 'ip' => $_SERVER['REMOTE_ADDR']
        ];
    }

    public function isAutenticado() {
        return (isset($_SESSION['usuario_autenticado']) &&
                ($_SESSION['usuario_autenticado']['ip'] == $_SERVER['REMOTE_ADDR'])
                );
    }

    public function logon($login, $senha) {
        if ($this->autenticar($login, $senha)) {
            $this->guardaDadosEmSessao($login);
            return true;
        }
        
        return false;
        
    }

    public function logout() {
        unset($_SESSION['usuario_autenticado']);

    }

}

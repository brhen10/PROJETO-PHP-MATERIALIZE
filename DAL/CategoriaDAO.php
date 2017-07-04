<?php

require_once("Banco.php");
require_once("Model/Categoria.php");

class CategoriaDAO {

    private $banco;
    private $debug;

    public function __construct() {
        $this->banco = new Banco();
        $this->debug = true;
    }

    public function __destruct() {
        $this->banco->Disconnect();
    }

    public function RetornaTudo() {
        try {
            $sql = "SELECT idcategoria, nome FROM categoria";
            $dtcategoria = [];

            $retornoBanco = $this->banco->ExecuteQuery($sql);

            foreach ($retornoBanco as $ln) {
                $categoria = new Categoria();

                $categoria->setCod($ln["idcategoria"]);
                $categoria->setNome($ln["nome"]);

                $dtcategoria[] = $categoria;
            }

            return $dtcategoria;
            
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
        
    }

}

?>
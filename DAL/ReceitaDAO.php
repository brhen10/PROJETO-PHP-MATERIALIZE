<?php

require_once("Banco.php");
require_once("Model/Medicamento.php");

class ReceitaDAO {

    private $banco;
    private $debug;

    public function __construct() {
        $this->banco = new Banco();
        $this->debug = true;
    }

    public function __destruct() {
        $this->banco->Disconnect();
    }

    public function Cadastrar(Medicamento $medicamento) {
        try {
            $sql = "INSERT INTO medicamento (titulo, composicao, indicacao, data, idcategoria)"
                    . " VALUES (:titulo, :composicao, :indicacao, :data, :idcategoria)";

            $param = array(
                
                ":titulo" => $medicamento->getTitulo(),
                ":composicao" => $medicamento->getComposicao(),
                ":indicacao" => $medicamento->getIndicacao(),
                ":data" => $medicamento->getData(),
                ":idcategoria" => $medicamento->getIdcategoria()
            );

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
    }

    public function RetornaTudo() {
        try {
            $sql = "SELECT cod, titulo, data FROM medicamento ORDER BY titulo ASC";
            $dtmedicamento = [];

            $retornoBanco = $this->banco->ExecuteQuery($sql);

            foreach ($retornoBanco as $ln) {
                $medicamento = new Medicamento();

                $medicamento->setCod($ln["cod"]);
                $medicamento->setTitulo($ln["titulo"]);
                $medicamento->setData($ln["data"]);

                $dtmedicamento[] = $medicamento;
            }

            return $dtmedicamento;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
    }

    public function RetornaMedicamento($cod) {

        try {
            $sql = "SELECT cod, titulo, composicao, indicacao, data FROM medicamento WHERE cod = :cod";

            $param = array(
                ":cod" => $cod
            );

            $retornoBanco = $this->banco->ExecuteQueryOneRow($sql, $param);

            $medicamento = new Medicamento();

            $medicamento->setCod($retornoBanco["cod"]);
            $medicamento->setTitulo($retornoBanco["titulo"]);
            $medicamento->setComposicao($retornoBanco["composicao"]);
            $medicamento->setIndicacao($retornoBanco["indicacao"]);
            $medicamento->setData($retornoBanco["data"]);

            return $medicamento;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
    }

    public function Alterar(Medicamento $medicamento) {
        try {
            $sql = "UPDATE medicamento SET titulo = :titulo, composicao = :composicao, indicacao = :preparo, idcategoria = :idcategoria WHERE cod = :cod";

            $param = array(
                ":idcategoria" => $medicamento->getIdcategoria(),
                ":titulo" => $medicamento->getTitulo(),
                ":composicao" => $medicamento->getComposicao(),
                ":preparo" => $medicamento->getIndicacao(),
                ":cod" => $medicamento->getCod()
            );

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
    }

    public function Deletar($cod) {
        try {

            $sql = "DELETE FROM medicamento WHERE cod = :cod";

            $param = array(
                ":cod" => $cod
            );

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "Erro: {$ex->getMessage()}";
            }
        }
    }

}

?>
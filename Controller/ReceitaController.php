<?php

require_once("DAL/ReceitaDAO.php");

class ReceitaController {

    private $receitaDAO;

    public function __construct() {
        $this->receitaDAO = new ReceitaDAO();
    }

    public function Cadastrar(Medicamento $medicamento) {
        if (trim(strlen($medicamento->getTitulo()) > 0) && trim(strlen($medicamento->getComposicao()) > 0) && trim(strlen($medicamento->getIndicacao()) > 0)) {
            return $this->receitaDAO->Cadastrar($medicamento);
        } else {
            return false;
        }
    }

    function RetornaTudo() {
        return $this->receitaDAO->RetornaTudo();
    }

    public function RetornaMedicamento($cod) {

        if ($cod > 0) {
            return $this->receitaDAO->RetornaMedicamento($cod);
        } else {
            return null;
        }
    }

    public function Alterar(Medicamento $medicamento) {
        if (trim(strlen($medicamento->getTitulo()) > 0) && trim(strlen($medicamento->getComposicao()) > 0) && trim(strlen($medicamento->getIndicacao()) > 0 )) {
            return $this->receitaDAO->Alterar($medicamento);
        } else {
            return false;
        }
    }

    public function Deletar($cod) {
        if ($cod > 0) {
            return $this->receitaDAO->Deletar($cod);
        } else {
            return false;
        }
    }

}

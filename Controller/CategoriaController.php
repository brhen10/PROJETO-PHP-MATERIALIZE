<?php

require_once("DAL/CategoriaDAO.php");

class CategoriaController {

    private $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function Cadastrar(Categoria $categoria) {
        if (trim(strlen($categoria->getNome()) > 0)) {
            return $this->categoriaDAO->Cadastrar($categoria);
           // return false;
        } else {
            return false;
        }
    }

    function RetornaTudo() {
        return $this->categoriaDAO->RetornaTudo();
    }

    public function RetornaCategoria($cod) {

        if ($cod > 0) {
            return $this->categoriaDAO->RetornaCategoria($cod);
            //return null;
        } else {
            return null;
        }
    }

    public function Alterar(Categoria $categoria) {
        if (trim(strlen($categoria->getIdcategoria()) > 0)&& trim(strlen($categoria->getNome()) > 0)) {
            return $this->categoriaDAO->Alterar($ca);
            //return false;
        } else {
            return false;
        }
    }

    public function Deletar($cod) {
        if ($cod > 0) {
            return $this->categoriaDAO->Deletar($cod);
            //return false;
        } else {
            return false;
        }
    }

}

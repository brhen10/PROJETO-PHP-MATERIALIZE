<?php

class Medicamento {

    private $cod;
    private $titulo;
    private $composicao;
    private $indicacao;
    private $data;
    private $idcategoria;
    
    function getIdcategoria() {
        return $this->idcategoria;
    }

    function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }
    
    function getCod() {
        return $this->cod;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getComposicao() {
        return $this->composicao;
    }

    function getIndicacao() {
        return $this->indicacao;
    }

    function getData() {
        return $this->data;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setComposicao($composicao) {
        $this->composicao = $composicao;
    }

    function setIndicacao($indicacao) {
        $this->indicacao = $indicacao;
    }

    function setData($data) {
        $this->data = $data;
    }

}

?>


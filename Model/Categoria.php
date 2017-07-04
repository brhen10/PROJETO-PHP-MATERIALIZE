<?php

class Categoria {

    private $cod;
    private $nome;
    
    function getCod() {
        return $this->cod;
    }

    function getNome() {
        return $this->nome;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }    

}

?>


<?php

class Ingredientes { 
    private $idIngredientes;
    private $vegetais;
    private $frutas;
    private $legumes;
    private $carboidratos;
    private $proteinas;
    private $lacteos;
    private $doces;
    private $ovos;
     
    function __construct($idIngredientes,$vegetais,$frutas,$legumes,$carboidratos,$proteinas,$lacteos,$doces,$ovos) 
    { 
       $this->idIngredientes = $idIngredientes;
       $this->vegetais = $vegetais;
       $this->frutas = $frutas;
       $this->legumes = $legumes;
       $this->carboidratos = $carboidratos;
       $this->proteinas = $proteinas;
       $this->lacteos = $lacteos;
       $this->doces = $doces;
       $this->ovos = $ovos;
       $this->idIngredientes = $idIngredientes;
    }
    
    public function getIdIngredientes(){ 
        return $this->idIngredientes;
    }
    public function getVegetais(){ 
        return $this->vegetais;
    }
    public function getFrutas(){ 
        return $this->frutas;
    }
    public function getLegumes(){ 
        return $this->legumes;
    }
    public function getCarboidratos(){ 
        return $this->carboidratos;
    }
    public function getProteinas(){ 
        return $this->proteinas;
    }
    public function getLacteos(){ 
        return $this->lacteos;
    }
    public function getDoces(){ 
        return $this->doces;
    }
    public function getOvos(){ 
        return $this->ovos;
    }
}

?>


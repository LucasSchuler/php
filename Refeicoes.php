<?php

class Refeicoes { 
    private $idRefeicoes;
    private $massas;
    private $sopas;
    private $bolos;
    private $lanches;
    private $sobremesas;
    private $bebidas;
    private $molhos;
     
    function __construct($idRefeicoes,$massas,$sopas,$bolos,$lanches,$sobremesas,$bebidas,$molhos) 
    { 
       $this->idRefeicoes = $idRefeicoes;
       $this->massas = $massas;
       $this->sopas = $sopas;
       $this->bolos = $bolos;
       $this->lanches = $lanches;
       $this->sobremesas = $sobremesas;
       $this->bebidas = $bebidas;       
       $this->molhos = $molhos;
    }
    
    public function getId(){ 
        return $this->idRefeicoes;
    }
     public function getMassas(){ 
        return $this->massas;
    } 
     public function getSopas(){ 
        return $this->sopas;
    } 
    public function getBolos(){ 
        return $this->bolos;
    }
     public function getLanches(){ 
        return $this->lanches;
    } 
     public function getSobremesas(){ 
        return $this->sobremesas;
    } 
     public function getBebidas(){ 
        return $this->bebidas;
    } 
     public function getMolhos(){ 
        return $this->molhos;
    }    
}


<?php

class Refeicoes { 
    private $idRefeicoes;
    private $massas;
    private $sopas;
    private $bolos;
    private $lanches;
    private $sobremesas;
    private $bebidas;
    private $assados;
    private $grelhados;
    private $refogados;
    private $molhos;
     
    function __construct($idRefeicoes,$massas,$sopas,$bolos,$lanches,$sobremesas,$bebidas,$assados,$grelhados,$refogados,$molhos) 
    { 
       $this->idRefeicoes = $idRefeicoes;
       $this->massas = $massas;
       $this->sopas = $sopas;
       $this->bolos = $bolos;
       $this->lanches = $lanches;
       $this->sobremesas = $sobremesas;
       $this->bebidas = $bebidas;
       $this->assados = $assados;
       $this->grelhados = $grelhados;
       $this->refogados = $refogados;
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
     public function getAssados(){ 
        return $this->assados;
    } 
    public function getGrelhados(){ 
        return $this->grelhados;
    } 
     public function getRefogados(){ 
        return $this->refogados;
    }
     public function getMolhos(){ 
        return $this->molhos;
    }    
}


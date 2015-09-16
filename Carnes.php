<?php

class Carnes { 
    private $idCarnes;
    private $CAve;
    private $CSuino;
    private $CBovino;
    private $CPeixe;
    private $CCarneiro;
    private $COutras;
     
    function __construct($idCarnes,$CAve,$CSuino,$CBovino,$CPeixe,$CCarneiro,$COutras) 
    { 
       $this->idCarnes = $idCarnes;
       $this->CAve = $CAve;
       $this->CSuino = $CSuino;
       $this->CBovino = $CBovino;
       $this->CPeixe = $CPeixe;
       $this->CCarneiro = $CCarneiro;
       $this->COutras = $COutras;
    }    
    
    public function getId(){ 
        return $this->idCarnes;
    }  
    public function getCAve(){ 
        return $this->CAve;
    }
    public function getCSuino(){ 
        return $this->CSuino;
    }
    public function getCBovino(){ 
        return $this->CBovino;
    }
    public function getCPeixe(){ 
        return $this->CPeixe;
    }
    public function getCCarneiro(){ 
        return $this->CCarneiro;
    }
    public function getCOutras(){ 
        return $this->COutras;
    }
}




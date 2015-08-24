<?php

class Usuario { 
    private $nome;
     
    function __construct($n) 
    { 
       $this->nome = $n;
       
    }    
    public function getNome(){ 
        return $this->nome;
    }
    
}



?>


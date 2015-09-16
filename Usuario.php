<?php
include_once 'Carnes.php';
include_once 'Ingredientes.php';
include_once 'Refeicoes.php';

class Usuario { 
    private $id;
    private $nome;
    private $isVegan;
    private $carnes;
    private $refeicoes;
    private $ingredientes;
    
    function __construct($id,$nome,$isVegan,$carnes,$refeicoes,$ingredientes) 
    { 
       $this->id = $id; 
       $this->nome = $nome;
       $this->isVegan = $isVegan;
       $this->carnes = $carnes;
       $this->refeicoes = $refeicoes;
       $this->ingredientes = $ingredientes;
    } 
    
    public function getId(){ 
        return $this->id;
    }  
    
    public function getNome(){ 
        return $this->nome;
    }  
    public function isVegan(){ 
        return $this->isVegan;
    }  
    public function getCarnes(){ 
        return $this->carnes;
    }
    public function getRefeicoes(){ 
        return $this->refeicoes;
    }
    public function getIngredientes(){ 
        return $this->ingredientes;
    }
}


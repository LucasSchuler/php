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
    
    public function sugestao($hora,$minutos){
        //FINAL DE SEMANA
//        if(fim de semana = true){            
//            if($hora >=0 && ($hora <=10 && $minutos==0)){
//                //3 bebidas - não alcoolicos
//                //3 bolos e tortas - sem recheios e coberturas
//                //4 salgados (massas - paes) - (lanches/todos)                                
//                
//            }else if($horas>=10 && ($horas<=14 && $minutos <= 30)){
//                // 6 comidas
//                // 2 sobremesas
//                // 2 saladas/acompanhamentos
//            }else if(($hora >= 14 && minutos > 30) && ($hora<=18 && $minutos <=30)){
//                //3 bebidas
//                //3 doces (bolos e tortas)
//                //4 salgados(paes)
//            }else{
//                // 7 comidas
//                // 1 sobremesas
//                // 2 saladas/acompanhamentos
//            }
//        }
//        
//        //DIA DE SEMANA
//        if($horas>=10 && ($horas<=13 && $minutos <= 30)){
//            
//        }
    }
}


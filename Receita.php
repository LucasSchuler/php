<?php

class Receita { 
    private $nome;
    private $imagem;
    private $ingredientes;
    private $preparo;
    private $rendimento;
    private $tempo;
    private $site;
    private $id;
    private $idCategoria;
    
    function __construct($id,$n,$img,$ing,$prep,$rend,$temp,$s,$idCategoria) 
    { 
       $this->id = $id; 
       $this->nome = $n;
       $this->imagem = $img;
       $this->ingredientes = $ing;
       $this->preparo = $prep;
       $this->rendimento = $rend;
       $this->tempo = $temp;
       $this->site = $s;
       $this->idCategoria = $idCategoria;
    } 
    
    public function getId(){ 
        return $this->id;
    }
    public function getNome(){ 
        return $this->nome;
    }
    public function getImagem(){ 
        return $this->imagem;
    }
    public function getIngredientes(){  
        
        //$ingString;
        $n_palavras=count($this->ingredientes);
              for($i=0 ; $i < $n_palavras ; $i++ ){
                $ingString = $this->ingredientes[$i].$ingString." * " ;
              }
        
        return $ingString;
        //return $this->ingredientes;
    }
    public function getPreparo(){ 
        
        
        //$IntrucString;
        $n_palavras1=count($this->preparo);
              for($i=0 ; $i < $n_palavras1 ; $i++ ){
                $IntrucString = $this->preparo[$i].$IntrucString." * " ;
              }
        
        return $IntrucString;
        
        //return $this->preparo;
    }
    public function getRendimento(){     
        return $this->rendimento;
    }
    public function getTempo(){  
        return $this->tempo;
    }
    public function getSite(){     
        return $this->site;
    }
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    
}
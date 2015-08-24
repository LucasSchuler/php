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
        return $this->ingredientes;
    }
    public function getPreparo(){ 
        return $this->preparo;
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
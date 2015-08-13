<?php

class Receita { 
    private $nome;
    private $imagem;
    private $ingredientes;
    private $preparo;
    private $rendimento;
    private $tempo;
    private $site;
    
    function __construct($n,$img,$ing,$prep,$rend,$temp,$s) 
    { 
       $nome = $n;
       $imagem = $img;
       $ingredientes = $ing;
       $preparo = $prep;
       $rendimento = $rend;
       $tempo = $temp;
       $site = $s;
    } 
    
    public function getNome(){ 
        return nome;
    }
    public function getImagem(){ 
        return imagem;
    }
    public function getIngredientes(){  
        return ingredientes;
    }
    public function getPreparo(){ 
        return preparo;
    }
    public function getRendimento(){     
        return rendimento;
    }
    public function getTempo(){  
        return tempo;
    }
    public function getSite(){     
        return site;
    }
    
}
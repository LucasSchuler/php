<?php
ini_set('memory_limit', '8024M');
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
    
    public function separaQuantidadeIngredientes2($ingredient, $size,$posicaoAtual,$aux,$novaString){
        if($posicaoAtual>$size){
          //  echo($novaString);
            return $novaString;}
        $char = $ingredient[$posicaoAtual];
        if($aux==true){
            if(is_numeric($char)){
               // echo($char);
                $novaString = $novaString.$char;
               return $this->separaQuantidadeIngredientes2($ingredient,$size,$posicaoAtual+1,true,$novaString);
            }else if ($char == "," || $char == "." || $char == "/"){
                //echo($char);
                $novaString = $novaString.$char;
               return $this->separaQuantidadeIngredientes2($ingredient,$size,$posicaoAtual+1,true,$novaString);
            }else{
                //echo("+");
                $novaString = $novaString."+";
                //echo($char);
                $novaString = $novaString.$char;
//                // coloca o sinal de + na posicao atual
               return $this->separaQuantidadeIngredientes2($ingredient,$size,$posicaoAtual+1,false,$novaString);
            }
        }else{
            if(is_numeric($char)){
//                // coloca o sinal de + na posicao atual
               // echo("+");
                $novaString = $novaString."+";
               // echo($char);
                $novaString = $novaString.$char;
                return $this->separaQuantidadeIngredientes2($ingredient,$size,$posicaoAtual+1,true,$novaString);
            }else{
               // echo($char);
                $novaString = $novaString.$char;
                return $this->separaQuantidadeIngredientes2($ingredient,$size,$posicaoAtual+1,false,$novaString);
            }
        }
       }
    
    public function separaQuantidadeIngredientes($ingredient){
        return $this->separaQuantidadeIngredientes2($ingredient, strlen($ingredient)-1, 0, false,"");
    }
    
    public function getIngredientes(){  
        $ingString="";
        $n_palavras=count($this->ingredientes);
        //$novo = $this->separaQuantidadeIngredientes($this->ingredientes[0]); 
       // echo($novo);        
              for($i=0 ; $i < $n_palavras ; $i++ ){ 
                $novo = $this->separaQuantidadeIngredientes($this->ingredientes[$i]);
                $ingString = $ingString.$novo." *" ;
              }
        $size = strlen($ingString);
        $ingString = substr($ingString,0, $size-1);
        return $ingString;
    }
    
    public function getPreparo(){ 
        $IntrucString= "";
        $n_palavras1=count($this->preparo);
              for($i=0 ; $i < $n_palavras1 ; $i++ ){
                $IntrucString =$IntrucString.$this->preparo[$i]." *" ;
              }
        $size = strlen($IntrucString);
        $IntrucString = substr($IntrucString,0, $size-1);
        return $IntrucString;
    }
    
    public function getRendimento(){         
        $porcao = explode(" ", $this->rendimento);
        return (int)$porcao[1];
    }
    
    public function getTempo(){         
        $veri = strripos($this->tempo, 'h');
        $int;        
        if($veri===false){
            $time = explode("min", $this->tempo);
            $int = $time[0];
            echo $time[0];
        }
        else{
            $hora = explode("h", $this->tempo);
            $time = explode("min", $hora[1]);
            
            $int = ((int)$hora[0]*60)+ (int)$time[0];   
        }
        return $int;
    }
    
    public function getSite(){     
        return $this->site;
    }
    
    public function getIdCategoria(){
        return $this->idCategoria;
    }
}
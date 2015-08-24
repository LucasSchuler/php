<?php
    include_once 'Connection.php';
    include_once 'Receita.php';

class tudogostoso { 
    
    function __construct() 
    { 
      // $this->buscaCarnes();
         $this->buscaSopas();
    } 
    
    public function buscaCarnes(){
        $meuArray = array();
        $cont = 0;
        $aux=1;
        for($i =1; $i <= 3; $i++){      
            $path='http://www.tudogostoso.com.br/categorias/1004-carnes-'.$i.'.html';
            $html = file_get_contents($path);   
            $dom = new DOMDocument();   
            @$dom->loadHTML($html);    
            $xpath = new DOMXPath($dom);        
            foreach ($xpath->query('//a[contains(@href, "receita/")]') as $a) {
                if($aux==11){echo("a");$aux=1;}
                else{
                $meuArray[$cont] = 'http://www.tudogostoso.com.br/'.$a->getAttribute('href');
                $cont++; 
                $aux++;
                }
            }
        }  
        $this->analisatudogostoso($meuArray,1);
    }
    
    public function buscaSopas(){
        $meuArray = array();
        $cont = 0;
        $aux=1;
        for($i =1; $i <= 1; $i++){      
            $path='http://www.tudogostoso.com.br/categorias/1027-sopas-'.$i.'.html';
            $html = file_get_contents($path);   
            $dom = new DOMDocument();   
            @$dom->loadHTML($html);    
            $xpath = new DOMXPath($dom);        
            foreach ($xpath->query('//a[contains(@href, "receita/")]') as $a) {
                if($aux==11){echo("a");$aux=1;}
                else{
                $meuArray[$cont] = 'http://www.tudogostoso.com.br/'.$a->getAttribute('href');
                $cont++; 
                $aux++;
                }
            }
        }  
        $this->analisatudogostoso($meuArray,3);
    }
   
    public function analisatudogostoso($array,$idCategoria){ 
        foreach ($array as &$value) {
            $html = file_get_html($value);

            echo '<br />';
            
            $imageurl = $html->find('*[class="pic"]', 0);
            $image = $imageurl->getAttribute('src');
            echo $image;

            echo '<br />';
            
            $name1 = $html->find("span.current",0);
            $name = \strip_tags($name1);
            echo ($name1);

            $recipelist1 = $html->find('div.recipelist', 0);
            $recipelist = \strip_tags($recipelist1);
            echo $recipelist1;

            $idRecipe1 = $html->find('*[class="tdg-bt round orange recipebook"]', 0);
            $idRecipe = $idRecipe1->getAttribute('data-recipe-id');
            echo $idRecipe;
            
            $IntructionsRecipelist1 = $html->find('*[class="recipelist instructions"]', 0);
            $IntructionsRecipelist = \strip_tags($IntructionsRecipelist1);
            echo $IntructionsRecipelist1;
            
            $rendimento1 = $html->find("span.label",1);
            $rendimento = \strip_tags($rendimento1);
            echo $rendimento1;

            $porcao1 = $html->find('*[class="num yield"]',0);
            $porcao = \strip_tags($porcao1);
            echo $porcao1;

            $tempPreparoTitle1 = $html->find("span.label",0);
            $tempPreparoTitle = \strip_tags($tempPreparoTitle1);
            echo $tempPreparoTitle1;

            $tempPreparo1 = $html->find('*[class="num preptime"]',0);
            $tempPreparo = \strip_tags($tempPreparo1);
            echo $tempPreparo1;
            
            $site="www.tudogostoso.com.br";
            $receita = new Receita($idRecipe,$name,$image,$recipelist,$IntructionsRecipelist,$porcao,$tempPreparo,$site,$idCategoria);
            $connection = new Connection();
            //$connection->Connect();
            $connection->save($receita);   
        } 
    }
} 

?>
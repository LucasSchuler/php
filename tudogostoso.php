
<?php
    include_once 'Connection.php';
    include_once 'Receita.php';

class tudogostoso { 

    function __construct() 
    { 
       $this->buscaCarnes();
      ///   $this->buscaSopas();
        //$this->buscaMassas();          
    } 
    
    public function buscaCarnes(){
        $meuArray = array();
        $cont = 0;
        $aux=1;
        for($i =1; $i <= 1; $i++){      
            $path='http://www.tudogostoso.com.br/categorias/1004-carnes-'.$i.'.html';
            $html = file_get_contents($path);   
            $dom = new DOMDocument();   
            @$dom->loadHTML($html);    
            $xpath = new DOMXPath($dom);        
            foreach ($xpath->query('//a[contains(@href, "receita/")]') as $a) {
                if($aux==11){$aux=1;}
                else{
                $meuArray[$cont] = 'http://www.tudogostoso.com.br/'.$a->getAttribute('href');
                $cont++; 
                $aux++;
                }
            }
        }  
        $this->analisatudogostoso($meuArray,1);
    }
    
       public function buscaMassas(){
        $meuArray = array();
        $cont = 0;
        $aux=1;
        for($i =1; $i <= 1; $i++){      
            $path='http://www.tudogostoso.com.br/categorias/1028-massas-'.$i.'.html';
            $html = file_get_contents($path);   
            $dom = new DOMDocument();   
            @$dom->loadHTML($html);    
            $xpath = new DOMXPath($dom);        
            foreach ($xpath->query('//a[contains(@href, "receita/")]') as $a) {
                if($aux==11){$aux=1;}
                else{
                $meuArray[$cont] = 'http://www.tudogostoso.com.br/'.$a->getAttribute('href');
                $cont++; 
                $aux++;
                }
            }
        }  
        $this->analisatudogostoso($meuArray,2);
    }
    
    public function buscaSopas(){
        $meuArray = array();
        $cont = 0;
        $aux=1;
        for($i = 1; $i <= 2; $i++){      
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
        $arrayReceitasSalvar = array();
        $cont=0;
        foreach ($array as &$value) {
            $html = file_get_html($value);

            $imageurl = $html->find('*[class="photo pic"]', 0);
            
            if($imageurl!=NULL){
            
                $image = $imageurl->getAttribute('src');
            //    echo $image;

              //  echo '<br />';
            
                $name1 = $html->find("span.current",0);
                $name = \strip_tags($name1);
                //echo ($name1);           

                $idRecipe1 = $html->find('*[class="tdg-bt round orange recipebook"]', 0);
                $idRecipe = $idRecipe1->getAttribute('data-recipe-id');
                $idRecipe = $idRecipe."tudogostoso";
                //echo $idRecipe;

                $recipelist = $html->find('div.recipelist', 0);
                $arrayIngredients=explode("<span>",$recipelist);
                $n_palavras=count($arrayIngredients);
                for($i=0 ; $i < $n_palavras ; $i++ ){
                    $arrayIngredients[$i] = \strip_tags($arrayIngredients[$i]);
                    //echo $arrayIngredients[$i];
                  //  echo '<br />';
                }
        
                if($arrayIngredients[0]==' '){
                    unset($arrayIngredients[0]);
                    $arrayIngredients = array_values($arrayIngredients);
                }

                $IntructionsRecipelist1 = $html->find('*[class="recipelist instructions"]', 0);
                $arrayIntructions=explode("<span>",$IntructionsRecipelist1);
                $n_palavras1=count($arrayIntructions);
                for($i=0 ; $i < $n_palavras1 ; $i++ ){
                    $arrayIntructions[$i] = \strip_tags($arrayIntructions[$i]);
                    //echo $arrayIntructions[$i];
                    //echo '<br />';
                }
                if($arrayIntructions[0]==' '){
                    unset($arrayIntructions[0]);
                     $arrayIntructions = array_values($arrayIntructions);
                }
             
                $porcao1 = $html->find('*[class="num yield"]',0);
                $porcao = \strip_tags($porcao1);

                $tempPreparo1 = $html->find('*[class="num preptime"]',0);
                $tempPreparo = \strip_tags($tempPreparo1);
            
                $site="www.tudogostoso.com.br";
                $receita = new Receita($idRecipe,$name,$image,$arrayIngredients,$arrayIntructions,$porcao,$tempPreparo,$site,$idCategoria);
                $arrayReceitasSalvar[$cont] = $receita; 
                $cont++;
            } 
        }
            $connection = new Connection();
            $connection->save($arrayReceitasSalvar);  
           // $connection->deletaTudo();  
    }
} 

?>
<?php
include_once 'Connection.php';
include_once 'Receita.php';

class tudogostoso { 
    public function analisatudogostoso($array){ 

        foreach ($array as &$value) {
            $html = file_get_html($value);

            //---------------------
//            $doc = new DOMDocument();
//            @$doc->loadHTML($html);
//            $xpath = new DOMXPath($doc);
//            $imageTags = $doc->getElementsByTagName('img');
//            $array2 = array();
//            $count = 0;
//            foreach($imageTags as $tag) {
//                $array2[$count] = $tag->getAttribute('src');       
//                 $count++;
//            }
//            //echo $array[9]; 
//            $image = $array2[9];
//            echo $image;
            
            //--------------------

            $name = $html->find("span.current",0);
            echo $name;

            $recipelist = $html->find('div.recipelist', 0);  
            echo $recipelist;

            $IntructionsRecipelist = $html->find('*[class="recipelist instructions"]', 0);
            echo $IntructionsRecipelist;
            
            $rendimento = $html->find("span.label",1);
            echo $rendimento;

            $porcao = $html->find('*[class="num yield"]',0);
            echo $porcao;

            $tempPreparoTitle = $html->find("span.label",0);
            echo $tempPreparoTitle;

            $tempPreparo = $html->find('*[class="num preptime"]',0);
            echo $tempPreparo;
            
            $site="www.tudogostoso.com.br";
            $receita = new Receita($name,$image,$recipelist,$IntructionsRecipelist,$rendimento,$tempPreparo,$site);
            
            $connection = new Connection();
            $connection->save($receita);   
        } 
    }
} 

?>
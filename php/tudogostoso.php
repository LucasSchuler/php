<?php
include_once 'Connection.php';
include_once 'Receita.php';

class tudogostoso { 
    public function analisatudogostoso($array){ 

        foreach ($array as &$value) {
            $html = file_get_html($value);

            $image = "imagem";

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
            //$connection->Connect();
            $connection->save($receita);   
        } 
    }
} 

?>
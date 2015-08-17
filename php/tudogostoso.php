<?php
include_once 'Connection.php';
include_once 'Receita.php';

class tudogostoso { 
    public function analisatudogostoso($array){ 

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
            $receita = new Receita($name,$image,$recipelist,$IntructionsRecipelist,$porcao,$tempPreparo,$site);
            $connection = new Connection();
            //$connection->Connect();
            $connection->save($receita);   
        } 
    }
} 

?>
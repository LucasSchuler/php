<?php
include_once 'Receita.php';

class Connection { 
    
    public function Connect(){ 
        $link = mysqli_connect("sql3.freemysqlhosting.net", "sql387426", "cV1%rM1*", "sql387426");
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $link;
    }
    
    public function save($receita){        
        if($receita instanceOf Receita){ 
            $link=$this->Connect();
            $sql = "INSERT INTO receita (nome, imagem, ingredientes,preparo,rendimento,tempo) "
            . "VALUES ('".$receita->getNome()."', '".$receita->getImagem()."', '".$receita->getIngredientes()."','".$receita->getPreparo()."','".$receita->getRendimento()."','".$receita->getTempo()."')";
        
            
            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
// Close connection
//mysqli_close($link);
        
            
            
            
        }
    }
}

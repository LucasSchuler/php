<?php
include_once 'Receita.php';

class Connection { 
    
    public function Connect(){ 
        $link = mysqli_connect("sql3.freemysqlhosting.net", "sql388062", "eA8%vH1%", "sql388062");
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $link;
    }
    
    public function save($receita){        
        if($receita instanceOf Receita){ 
            $link=$this->Connect();
            $sql = "INSERT INTO receita (idReceita,nome, imagem, ingredientes,preparo,rendimento,tempo,idCategoria) "
            . "VALUES ('".$receita->getId()."','".$receita->getNome()."', '".$receita->getImagem()."', '".$receita->getIngredientes()."','".$receita->getPreparo()."','".$receita->getRendimento()."','".$receita->getTempo()."','".$receita->getIdCategoria()."') "
                    . "on duplicate key update idReceita = '".$receita->getId()."'";
        
            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
// Close connection
           mysqli_close($link);
        }
    }
    
    public function saveUsuario($usuario){
        
        if($usuario instanceOf Usuario){ 
            $link=$this->Connect();
            $sql = "INSERT INTO usuario (nome) "
            . "VALUES ('".$usuario->getNome()."')";
        
            
            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        
        
        } 
    }
            
            
        
    
}

<?php
include_once 'Receita.php';

class Connection { 
    
    public function Connect(){ 
         //$link = mysqli_connect("vocecozinha.heliohost.org", "cozinha_app", "gotascaem", "cozinha_app");
         $link = mysqli_connect("sql3.freemysqlhosting.net", "sql388062", "eA8%vH1%", "sql388062");
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $link;
    }
    
    public function teste($arrayReceitasSalvar){
        $cont=0;
         foreach ($arrayReceitasSalvar as &$receita) {
             if($cont==0){
            if($receita instanceOf Receita){ 
              //  echo($receita->getNome());
                 $sql = $sql." ('".$receita->getId()."','".$receita->getNome()."', '".$receita->getImagem()."', '".$receita->getIngredientes()."','".$receita->getPreparo()."','".$receita->getRendimento()."','".$receita->getTempo()."','".$receita->getIdCategoria()."'),";                    
                        break;  
         }}
            $cont++;
        }
    }
    
    public function save($arrayReceitasSalvar){  
        $sql = "INSERT INTO receita (idReceita,nome, imagem, ingredientes,preparo,rendimento,tempo,idCategoria) VALUES ";
        foreach ($arrayReceitasSalvar as &$receita) {
            if($receita instanceOf Receita){ 
               
                $link=$this->Connect();
                 $sql = $sql." ('".$receita->getId()."','".$receita->getNome()."', '".$receita->getImagem()."', '".$receita->getIngredientes()."','".$receita->getPreparo()."','".$receita->getRendimento()."','".$receita->getTempo()."','".$receita->getIdCategoria()."'),";   
            }
        }
        $size = strlen($sql);
        $sql = substr($sql,0, $size-1);
        $sql = $sql." on duplicate key update idReceita = values(idReceita)"; 
        if(mysqli_query($link, $sql)){
            echo "Records added successfully.";
        } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($link);     
    }
    
    public function saveUsuario($usuario){
        if($usuario instanceOf Usuario){ 
            $this->saveCarnes($usuario->getCarnes());
            $this->saveIngredientes($usuario->getIngredientes());
            $this->saveRefeicoes($usuario->getRefeicoes());
            
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
    
    public function saveCarnes($carnes){
        if($carnes instanceOf Carnes){ 
            $link=$this->Connect();
            $sql = "INSERT INTO carnes (CAve,CSuino,CBovino,CPeixe,CCarneiro,COutras) "
            . "VALUES ('".$carnes->getCAve()."','".$carnes->getCSuino()."','".$carnes->getCBovino()."',"
                    . "'".$carnes->getCPeixe()."','".$carnes->getCCarneiro()."','".$carnes->getCOutras()."')";
        
            if(mysqli_query($link, $sql)){
                echo "Records c added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        } 
    }
    
    public function saveIngredientes($ingredientes){
        if($ingredientes instanceOf Ingredientes){ 
            $link=$this->Connect();
            $sql = "INSERT INTO ingredientes (vegetais,frutas,legumes,carboidratos,proteinas,lacteos,doces,ovos) "
            . "VALUES ('".$ingredientes->getVegetais()."','".$ingredientes->getFrutas()."','".$ingredientes->getLegumes()."',"
                    . "'".$ingredientes->getCarboidratos()."','".$ingredientes->getProteinas()."','".$ingredientes->getLacteos()."',"
                    . "'".$ingredientes->getDoces()."','".$ingredientes->getOvos()."')";
        
            if(mysqli_query($link, $sql)){
                echo "Records i added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        } 
    }
    
    public function saveRefeicoes($refeicoes){
        if($refeicoes instanceOf Refeicoes){ 
            $link=$this->Connect();
            $sql = "INSERT INTO refeicoes (massas,sopas,bolosTortas,lanches,sobremesas,bebidas,assados,grelhados,refogados,molhos) "
            . "VALUES ('".$refeicoes->getMassas()."','".$refeicoes->getSopas()."','".$refeicoes->getBolos()."','".$refeicoes->getLanches()."',"
                    . "'".$refeicoes->getSobremesas()."','".$refeicoes->getBebidas()."','".$refeicoes->getAssados()."','".$refeicoes->getGrelhados()."',"
                    . "'".$refeicoes->getRefogados()."','".$refeicoes->getMolhos()."')";
        
            if(mysqli_query($link, $sql)){
                echo "Records r added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        } 
    }
    
    public function deletaTudo(){
        $link=$this->Connect();
        $sql = "delete from receita"; 
        if(mysqli_query($link, $sql)){
            echo "Records deleted successfully.";
        } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($link);   
    }
}

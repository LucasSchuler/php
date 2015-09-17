<?php
include_once 'Connection.php';
include_once 'Usuario.php';
include_once 'Carnes.php';
include_once 'Refeicoes.php';
include_once 'Ingredientes.php';
include_once 'Receita.php';

//$id = $_POST['id'];
$id=1;
$a = new Connection();
$link = $a->Connect();

$user = null;

$sql = "SELECT * FROM usuario u inner join carnes c on u.idCarnes = c.idCarnes"
        . " inner join ingredientes i on u.idIngredientes = i.idIngredientes"
        . " inner join refeicoes r on u.idRefeicoes = r.idRefeicoes"
        . " where idUsuario = $id";
            
if ($result = mysqli_query($link, $sql))
{
	while($row = $result->fetch_object())
	{
           $carnes = new Carnes($row->idCarnes, $row->CAve, $row->CSuino, $row->CBovino, $row->CPeixe, $row->CCarneiro, $row->COutras);
           $ref = new Refeicoes($row->idRefeicoes, $row->massas, $row->sopas, $row->bolos, $row->lanches, $row->sobremesas, $row->bebidas, $row->molhos);
           $ing = new Ingredientes($row->idIngredientes, $row->vegetais, $row->frutas, $row->legumes, $row->doces, $row->ovos);
           $user = new Usuario($row->idUsuario, $row->nome, $row->isVegan, $carnes, $ref, $ing);
	}
}

sugestao($user);

//ARRUMAR QUANTIDADES DOS ARRAYS NO RAND**************
function sugestao($user){        
//       $hora = $_POST['hora'];
//       $minutos = $_POST['min'];
//       $dia = $_POST['dia'];
       $array = array();
        
       $hora=10;
       $minutos=30;
       $dia = "Saturday";
       
        //FINAL DE SEMANA
        if($dia == "Saturday" || $dia = "Sunday" ){   
            if($hora >=0 && ($hora <=10 && $minutos==0)){
                $array=manha($user);
            }else if($hora>=10 && ($hora<=14 && $minutos <= 30)){
                // 6 comidas  - carnes (todas) aves(todas) peixes(todas) sopas (todas) massas (sem pao) 
                // 2 sobremesas - doces(todas)
                // 2 saladas/acompanhamentos - saladas e acompanhamentos (menos molhos)
                $array=almoco($user);
            }else if(($hora >= 14 && minutos > 30) && ($hora<=18 && $minutos <=30)){
                $array=tarde($user);
            }else{
                // 7 comidas - 
                // 1 sobremesas
                // 2 saladas/acompanhamentos
                $array=noite($user);
        } 
        executeJson($array);
    }
}
    
    
    function manha($user){
        $array = array();
        $bebidas = executeSql("select * from receita where idCategoria = 9 and subCategoria like '%não alcoólicos%' and tempo <= 90 ORDER BY RAND() LIMIT 20");
        $doces = executeSql("select * from receita where idCategoria = 4 and subCategoria not like '%recheios e coberturas%' and tempo <= 60 ORDER BY RAND() LIMIT 20");
        $salgados = executeSql("select * from receita where ((idCategoria = 2 and subCategoria  like '%Pães%') or idCategoria = 6) and tempo <= 30 ORDER BY RAND() LIMIT 40");            
        
        
        executeJson($bebidas);
        echo("-----------------------");
        
        $keysBebidas = array();
        $keysSalgados = array();
        $keysDoces = array();
        
        if($user instanceOf Usuario){ 
            $ing = $user->getIngredientes();
            $ref = $user->getRefeicoes();
            if($ing instanceOf Ingredientes && $ref instanceOf Refeicoes){
                $keysDoces = defDoce($ing->getDoces(), $doces);
                $keysBebidas = defBebida($ref->getBebidas, $bebidas);
                
                $qtdSalg = 10 - (count($keysDoces) + count($keysBebidas));
                $keysSalgados = array_rand($salgados, $qtdSalg); 
                
                for($i=0;$i<count($keysBebidas);$i++){
                    array_push($array, $bebidas[$keysBebidas[$i]]);
                }
                for($i=0;$i<count($keysDoces);$i++){
                    array_push($array, $doces[$keysDoces[$i]]);
                }
                for($i=0;$i<count($keysSalgados);$i++){
                    array_push($array, $salgados[$keysSalgados[$i]]);
                }
            } 
        }
        return $array;
    }
    
    function defDoce($valor, $doces){
        $keysDoces = array();
        if($valor == 1 || $valor == 2){
            return array_rand($doces, 1); 
        }else if($valor == 3 || $valor == 4){
            return array_rand($doces, 2); 
        }else if($valor == 5){
            return array_rand($doces, 4); 
        }else{
            return $keysDoces;                           
        }
    }
    
    function defBebida($valor, $bebidas){
        $keysBebidas = array();
        if($valor >=0 || $valor <= 2){
            return array_rand($bebidas, 1); 
        }else if($valor >= 3 || $valor <= 4){
            return array_rand($bebidas, 2); 
        }else if($valor == 5){
            return array_rand($bebidas, 3); 
        }else{
            return $keysBebidas;                           
        }
    }
    
    function almoco($user){
        $carnes = executeSql("select * from receita where idCategoria = 1  or idCategoria = 5 or idCategoria = 7 and tempo <= 120 ORDER BY RAND() LIMIT 100");
        $comidas = executeSql("select * from receita where idCategoria = 2  or (idCategoria = 2 and subCategoria not like '%pães%') and tempo <= 120 ORDER BY RAND() LIMIT 40");
        $sobremesas = executeSql("select * from receita where idCategoria = 8  and tempo <= 50 ORDER BY RAND() LIMIT 10");
        $saladas = executeSql("select * from receita where idCategoria = 10  and (subCategoria like '%Saladas%' or subCategoria like '%Acompanhamentos%') and tempo <= 30 ORDER BY RAND() LIMIT 10");
                
        $keysCarnes = array();
        $keysComidas = array();
        $keysSobremesas = array();
        $keysSaladas = array();
         
        $array=array();
        
        if($user instanceOf Usuario){ 
            $ing = $user->getIngredientes();
            if($ing instanceOf Ingredientes){
                $keysCarnes = array_rand($carnes, 2);
                $keysComidas = array_rand($comidas, 2);
                $keysSobremesas = array_rand($sobremesas, 2);
                $keysSaladas = array_rand($saladas, 2);                               
                        
                for($i=0;$i<count($keysCarnes);$i++){
                    array_push($array, $carnes[$keysCarnes[$i]]);
                }
                for($i=0;$i<count($keysComidas);$i++){
                    array_push($array, $comidas[$keysComidas[$i]]);
                }
                for($i=0;$i<count($keysSobremesas);$i++){
                    array_push($array, $sobremesas[$keysSobremesas[$i]]);
                }
                for($i=0;$i<count($keysSaladas);$i++){
                    array_push($array, $saladas[$keysSaladas[$i]]);
                }
            } 
        }
        return $array;
    }
    
    function tarde($user){
        $array = array();
        $bebidas = executeSql("select * from receita where idCategoria = 9 and subCategoria like '%não alcoólicos%' and tempo <= 90 ORDER BY RAND() LIMIT 20");
        $doces = executeSql("select * from receita where idCategoria = 4 and subCategoria not like '%recheios e coberturas%' and tempo <= 60 ORDER BY RAND() LIMIT 20");
        $salgados = executeSql("select * from receita where ((idCategoria = 2 and subCategoria  like '%Pães%') or idCategoria = 6) and tempo <= 30 ORDER BY RAND() LIMIT 40");            
               
        $keysBebidas = array();
        $keysSalgados = array();
        $keysDoces = array();
        
        if($user instanceOf Usuario){ 
            $ing = $user->getIngredientes();
            if($ing instanceOf Ingredientes){
                if($ing->getDoces()==1){
                    $keysBebidas = array_rand($bebidas, 1);
                    $keysDoces = array_rand($doces, 1); 
                    $keysSalgados = array_rand($salgados, 1); 
                }else{
                    $keysBebidas = array_rand($bebidas, 2); 
                    $keysSalgados = array_rand($salgados, 2);                            
                }      
                        
                for($i=0;$i<count($keysBebidas);$i++){
                    array_push($array, $bebidas[$keysBebidas[$i]]);
                }
                for($i=0;$i<count($keysDoces);$i++){
                    array_push($array, $doces[$keysDoces[$i]]);
                }
                for($i=0;$i<count($keysSalgados);$i++){
                    array_push($array, $salgados[$keysSalgados[$i]]);
                }
            } 
        }
        return $array;
    }
    
    function noite($user){
        $carnes = executeSql("select * from receita where idCategoria = 1  or idCategoria = 5 or idCategoria = 7 and tempo <= 120 ORDER BY RAND() LIMIT 100");
        $comidas = executeSql("select * from receita where idCategoria = 2  or (idCategoria = 2 and subCategoria not like '%pães%') or (idCategoria = 6 and subCategoria like '%Bolos e tortas salgadas%') and tempo <= 120 ORDER BY RAND() LIMIT 40");
        $sobremesas = executeSql("select * from receita where idCategoria = 8  and tempo <= 50 ORDER BY RAND() LIMIT 5");
        $saladas = executeSql("select * from receita where idCategoria = 10  and (subCategoria like '%Saladas%' or subCategoria like '%Acompanhamentos%') and tempo <= 30 ORDER BY RAND() LIMIT 10");
                
        $keysCarnes = array();
        $keysComidas = array();
        $keysSobremesas = array();
        $keysSaladas = array();
                
        $array=array();
        
        if($user instanceOf Usuario){ 
            $ing = $user->getIngredientes();
            if($ing instanceOf Ingredientes){
                $keysCarnes = array_rand($carnes, 2);
                //$keysComidas = array_rand($comidas, 2);
                //$keysSobremesas = array_rand($sobremesas, 2);
                //$keysSaladas = array_rand($saladas, 2);                               
                        
                for($i=0;$i<count($keysCarnes);$i++){
                    array_push($array, $carnes[$keysCarnes[$i]]);
                }
//                for($i=0;$i<count($keysComidas);$i++){
//                    array_push($array, $comidas[$keysComidas[$i]]);
//                }
//                for($i=0;$i<count($keysSobremesas);$i++){
//                    array_push($array, $sobremesas[$keysSobremesas[$i]]);
//                }
//                for($i=0;$i<count($keysSaladas);$i++){
//                    array_push($array, $saladas[$keysSaladas[$i]]);
//                }
            } 
        }
        return $array;
    }
    
function executeSql($sql){
    $a = new Connection();
    $link = $a->Connect();
    $receitas = array();
    if ($result = mysqli_query($link, $sql))
    {            
        $tempArray = array();
	while($row = $result->fetch_object())
	{
        	//$receita = new Receita($row->idReceita, $row->nome, $row->imagem, $row->ingredientes, $row->preparo, $row->rendimento, $row->tempo, "tudogostoso", $row->idCategoria,$row->subCaregoria);
            $tempArray = $row;   
            array_push($receitas, $tempArray);
	}
        mysqli_close($link);
    }
    return $receitas;
}

function executeJson($array){
    echo json_encode($array);
 }
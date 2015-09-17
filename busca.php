<?php
include_once 'Connection.php';

$busca = $_POST['busca'];
$limiteInf = $_POST['limite'];

switch ($busca) {
    case "buscaPorSugestao":
        buscaPorsugestão();
        break;
    case "buscaCategoria":
        buscaPorCategoria($limiteInf);
        break;
    case "buscaPorNome":
        buscaPorNome($limiteInf);
        break;
    case "buscaPorDespensa":
        buscaPorDespensa();
        break;
    case "chamaOff":
        chamaOff();
        break;
}

function buscaPorCategoria($limiteInf){
    $id = $_POST['id'];
    $sql = "SELECT * FROM receita where idCategoria = $id LIMIT 10 OFFSET $limiteInf";
    executeJson($sql);
}

function buscaPorNome($limiteInf){
    $string = $_POST['string'];
    $categoria = $_POST['categoria'];
    $tempo = $_POST['tempo'];
    $porcao = $_POST['porcao'];
    $comIngs = $_POST['comIngredientes'];
    $semIngs = $_POST['semIngredientes'];
    
    $sql = "SELECT * FROM receita where nome like '%$string%' ";
    if($categoria>0){
        $sql = $sql."and idCategoria = $categoria ";
    }
    if($tempo>0){
        $sql = $sql."and tempo <= $tempo ";
    }
    if($porcao>0){
        $sql = $sql."and rendimento  = $porcao ";
    }
    if($comIngs != ""){
        $ings = explode(",", $comIngs);
        for($i=0;$i<count($ings);$i++){
            $sql = $sql."and ingredientes like '%$ings[$i]%' ";
        }
    }
    if($semIngs != ""){
        $ings = explode(",", $semIngs);
        for($i=0;$i<count($ings);$i++){
            $sql = $sql."and ingredientes not like '%$ings[$i]%' ";
        }
    }
    $sql = $sql."LIMIT 10 OFFSET $limiteInf";
    executeJson($sql);
}

function buscaPorDespensa(){
    $despensa = $_POST['despensa'];
    $ing=explode("#",$despensa);
    $contIng=count($ing);
    $sql = "SELECT * FROM receita where ingredientes like '%$ing[0]%' ";
    for($i=1 ; $i < $contIng ; $i++ ){
        $sql = $sql."and ingredientes like '%$ing[i]%' ";
    }
    executeJson($sql);
}

function chamaOff(){
    $sql = "select * from receita where idCategoria = 1 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array1 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 2 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array2 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 3 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array3 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 4 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array4 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 5 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array5 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 6 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array6 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 7 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array7 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 8 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array8 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 9 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array9 = executeSql($sql);
    $sql = "select * from receita where idCategoria = 10 ORDER BY RAND() LIMIT 10 OFFSET 0";
    $array10 = executeSql($sql);
    $merge = array_merge($array1, $array2, $array3, $array4,$array5, $array6, $array7, $array8, $array9, $array10);
     echo json_encode($merge);
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


function executeJson($sql){
    $a = new Connection();
    $link = $a->Connect();
    if ($result = mysqli_query($link, $sql))
    {
	$resultArray = array();
	$tempArray = array();
 
	while($row = $result->fetch_object())
	{
        	$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
        mysqli_close($link);
 
	echo json_encode($resultArray);
    }
}


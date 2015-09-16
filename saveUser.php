<?php

include_once 'Connection.php';
include_once 'Usuario.php';
include_once 'Carnes.php';
include_once 'Ingredientes.php';
include_once 'Refeicoes.php';

        $carnes = new Carnes(-1,$_POST['CAve'],$_POST['CSuino'],$_POST['CBovino'],
                $_POST['CPeixe'],$_POST['CCarneiro'],$_POST['COutras']);
        
        $ing = new Ingredientes(-1,$_POST['CVegetais'],$_POST['frutas'],$_POST['legumes'],
                $_POST['carboidratos'],$_POST['proteinas'],$_POST['lacteos'],$_POST['doces'],
                $_POST['ovos']);
        
        $ref = new Refeicoes(-1,$_POST['massas'],$_POST['sopas'],$_POST['bolos'],
                $_POST['lanches'],$_POST['sobremesas'],$_POST['bebidas'],$_POST['assados'],
                $_POST['grelhados'],$_POST['refogados'],$_POST['molhos']);
        
        $usuario = new Usuario(-1,$nome = $_POST['nome'],$_POST['isVegan'],$carnes,$ref,$ing);
        
        $connection = new Connection();
        $connection->saveUsuario($usuario);
        
     //   echo("aaaaaaaaaaaaaaaaaaaaaaaaa--------------");
//        $nome = $_POST['nome'];
//        $isVegan = $_POST['isVegan'];
//        $CAve = $_POST['CAve'];
//        $CSuino = $_POST['CSuino'];
//        $CBovino = $_POST['CBovino'];
//        $CPeixe = $_POST['CPeixe'];
//        $CCarneiro = $_POST['CCarneiro'];
//        $COutras = $_POST['COutras'];
//        $Vegetais = $_POST['CVegetais'];
//        $frutas = $_POST['frutas'];
//        $legumes = $_POST['legumes'];
//        $carboidratos = $_POST['carboidratos'];
//        $proteinas = $_POST['proteinas'];
//        $lacteos = $_POST['lacteos'];
//        $doces = $_POST['doces'];
//        $ovos = $_POST['ovos'];
//        $massas = $_POST['massas'];
//        $sopas = $_POST['sopas'];
//        $bolos = $_POST['bolos'];
//        $lanches = $_POST['lanches'];
//        $sobremesas = $_POST['sobremesas'];
//        $bebidas = $_POST['bebidas'];
//        $assados = $_POST['assados'];
//        $grelhados = $_POST['grelhados'];
//        $refogados = $_POST['refogados'];
//        $molhos = $_POST['molhos'];
        
//        echo("aquiiiiiiiiiiii");
//        echo $nome;
        
      //  $usuario = new Usuario($name);
        //$connection = new Connection();
        //$connection->Connect()
        //$connection->saveUsuario($usuario);   
         
   // }
//} 



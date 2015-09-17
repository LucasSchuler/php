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
                $_POST['lanches'],$_POST['sobremesas'],$_POST['bebidas'],$_POST['molhos']);
        
        $usuario = new Usuario(-1,$nome = $_POST['nome'],$_POST['isVegan'],$carnes,$ref,$ing);
        
        $connection = new Connection();
        $connection->saveUsuario($usuario);
        


<?php

include_once 'Connection.php';
include_once 'Usuario.php';

//class Server_App { 
  //  public function recebe(){ 

            
            
 
            $name = $_POST['name'];
            
            echo $name;

            $usuario = new Usuario($name);
            $connection = new Connection();
            //$connection->Connect();
            $connection->saveUsuario($usuario);   
         
   // }
//} 

?>
<?php

include_once 'Connection.php';
include_once 'Usuario.php';

//class Server_App { 
  //  public function recebe(){ 

            
            
 
            $name = $_POST['name'];

             //$title = $_POST['title'];
             //$description = $_POST['description'];
             //$city = $_POST['city'];

            // echo "Title: ". $title;
            // echo "Description: ". $description;
            // echo "City: ". $city;
            
            echo $name;

            $usuario = new Usuario($name);
            $connection = new Connection();
            //$connection->Connect();
            $connection->saveUsuario($usuario);   
         
   // }
//} 

?>
<?php
include_once 'Receita.php';

class Connection { 
    
    private $connect;
    
    public function Connect(){ 
        $host = "sql3.freesqldatabase.com:3306/sql386745";
        $user = "sql386745";
        $pass = "fN3*tG3*";
        $database = "sql386745";

        $connect = mysql_connect($host, $user, $pass);
        if ($connect) {
            $buka = mysql_select_db ($database);
        if (!$buka) {
            die ("Database tidak dapat dibuka");
        }
        } else {
            die ("Server MySQL tidak terhubung");       
        }
    }
    
    public function save($receita){
        $sql = "insert into receita("
         . "nome, imagem, ingredientes,preparo,rendimento,tempo,site" 
         . " ) VALUES (" 
         . "'" . $receita . "',"
         . "'" . $lastname . "',"
         . "'" . $gender . "',"
         . "'" . $gender . "',"
         . "'" . $gender . "',"
         . "'" . $gender . "',"
         . "'" . $Console .")";

    $connect->query($sql);
    }
}

<?php

header('Content-Type: text/html; charset=utf-8');
//echo("ölah");

include_once 'tudogostoso.php';
include("simple_html_dom.php");

$meuArray = array();
$cont = 0;
for($i =1; $i <= 1; $i++){
    $path='http://www.tudogostoso.com.br/categorias/1004-carnes-'.$i.'.html';
    $html = file_get_contents($path);   
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    
    $xpath = new DOMXPath($dom);
    foreach ($xpath->query('//a[contains(@href, "receita/")]') as $a) {
       // echo $a->getAttribute('href'), PHP_EOL;
        $meuArray[$cont] = 'http://www.tudogostoso.com.br/'.$a->getAttribute('href');
        $cont++;
       // echo $url.'<br />';
    }
    //print_r(array_values ($meuArray));
}  

$tudogostoso = new tudogostoso();
$tudogostoso->analisatudogostoso($meuArray);
?>
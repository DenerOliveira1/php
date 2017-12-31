<?php

//function __autoload($classe){
    //require_once ("$classe.php");
//}

/*function incluirClasses($nomeClasse){
    
    var_dump($nomeClasse);
    
    if (file_exists($nomeClasse . ".php") === true){
        require_once("$nomeClasse.php");
    }
}
spl_autoload_register("incluirClasses");*/

spl_autoload_register(function($nomeClasse){

    var_dump($nomeClasse);
    
    if (file_exists($nomeClasse . ".php") === true){
        require_once("$nomeClasse.php");
    }else if (file_exists("Abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true){
        require_once("Abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");
    }
    
});

$carro = new DelRey();

$carro->acelerar(80);
<?php

spl_autoload_register(function($nomeClasse){

    var_dump($nomeClasse);
    
    if (file_exists("Class" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true){
        require_once("Class" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");
    }else if (file_exists("Abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true){
        require_once("Abstratas" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");
    }
    
});


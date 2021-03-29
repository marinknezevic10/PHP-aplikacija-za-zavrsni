<?php
session_start();

//echo __DIR__;
define('BP',__DIR__ . DIRECTORY_SEPARATOR
            . 'app' . DIRECTORY_SEPARATOR);

//echo BP;

$putanje=implode(
    PATH_SEPARATOR,
    [
        BP  . 'model',
        BP  . 'controller'
    ]

);

//echo $putanje;
set_include_path($putanje);

spl_autoload_register(function($klasa){//kao parametar prima funkciju
    $putanje=explode(PATH_SEPARATOR,get_include_path());//dohvaćanje
    foreach($putanje as $p){
        if(file_exists($p . DIRECTORY_SEPARATOR . $klasa . '.php')){
            include $p . DIRECTORY_SEPARATOR . $klasa . '.php';
        }
        
    }

});//u cijeloj smo aplikaciji ucitali sve klase koje cemo staviti u model ili controller

App::start();//:: poziv staticne funkcije na klasi na koju nismo napravili novu instancu
//echo '<hr />';
//Zadaci::zadatak1();

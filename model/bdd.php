
<?php
ini_set('display_errors', 'on');


function etablirCo()
{
    $urlSGBD="localhost";
    $nomBDD="agencemb"; 
    $loginBDD="root";
    $mdpBDD="";
    try{
    $connex = new PDO("mysql:host=$urlSGBD;dbname=$nomBDD", "$loginBDD", "$mdpBDD", 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }
    catch (PDOException $error) {
        echo "Echec de la connexion veuillez contactez l'administrateur <br>";
        echo $error->getMessage();
    }
    
    return $connex;
}


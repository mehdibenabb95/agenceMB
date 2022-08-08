<?php


/**
 * Function qui permet d'établir la co a la BDD 
 * retourne la connexion
 */
function etablirCo()
{
    $urlSGBD="localhost";
    $nomBDD="agencemb"; 
    $loginBDD="root";
    $mdpBDD="";
    try{
        $connex = new PDO("mysql:host=$urlSGBD;dbname=$nomBDD", "$loginBDD", "$mdpBDD", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error) {
        echo "Il y a un problème lors de la connexion à la BDD <br>";
        echo $error->getMessage();
    }
    
    return $connex;
}

?>
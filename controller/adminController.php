<?php
require('model/manager/adminmanager.php');


//TODO Verification Admin

if(!isset($_GET['action']))
{
    $action="admin";
}
else{
    $action=filter_var($_GET['action'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

}

switch ($action){
    case "admin":
        
        require('view/admin.php');
    break;
    
        
default :
    require('view/404.php');
}

?>
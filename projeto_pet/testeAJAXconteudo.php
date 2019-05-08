<?php
 session_start();
 if(isset($_SESSION['crmv']))
 {
    foreach($_SESSION as $conteudo){
        $array[] = $conteudo;
    }

echo json_encode($array);
 }
 else{
    echo false;

 }
 
?>
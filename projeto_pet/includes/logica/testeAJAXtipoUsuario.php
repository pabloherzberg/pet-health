<?php
 session_start();
 if(isset($_SESSION['crmv'])){
    echo true;
 }
 else{
    echo false;
 }
 ?>
<?php
    $pdo = new PDO("pgsql:host=localhost; port=5432; dbname=banco_pet; user=postgres; password=senha5");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
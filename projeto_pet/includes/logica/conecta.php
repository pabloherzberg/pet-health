<?php
    $conexao = new PDO("pgsql:host=localhost; port=5432; dbname=banco_pet; user=postgres; password=senha5");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
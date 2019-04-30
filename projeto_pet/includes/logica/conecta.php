<?php
    //$conexao = pg_connect("host=localhost port=5432 dbname=teste user=postgres password=matrix");
    $conexao = new PDO("pgsql:host=localhost; port=5432; dbname=teste; user=postgres; password=matrix");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
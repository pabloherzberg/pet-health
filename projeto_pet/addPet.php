<?php
include_once('includes/cabecalho.php');
?>
    <title>Document</title>
</head>
<body>
<header></header>
<main>
    <form action="includes/logica.php" method="post">
        <input type="text" name="nome">
        <input type="date" name="dt_nascimento">
        <input type="submit" name='inserirPet' value="Inserir pet">
    </form>
    <input id='addPet' type="button" value="Add">
</main>
<footer></footer>
</body>
</html>
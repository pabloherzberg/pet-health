<?php
    include_once("includes/componentes/cabecalho.php");
?>

<link rel="stylesheet" href="assets/css/index.css">
    <title>Buscar Pet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
    <main>
        <form action="listaPetsBusca.php" method="post">
                Email do dono:<input type="text" name="email" placeholder="email do dono" >
                <input type="submit" class="btn cadastro" name="buscarPet" value="buscar">
        </form>
    </main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
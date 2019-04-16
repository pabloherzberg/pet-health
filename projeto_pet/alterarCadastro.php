<?php require('includes/componentes/cabecalho.php');
?>
<link rel="stylesheet" href="assets/css/index.css">

<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
        <form action="includes/logica/logica.php" method="post">
            <input type="text" name="nome">
            <input type="text" name="endereco">
            <input type="text" name="telefone">
            <input type="submit" name='alterarUsuario' value="Enviar">
        </form>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
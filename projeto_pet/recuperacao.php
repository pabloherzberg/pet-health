<?php require('includes/componentes/cabecalho.php');
 if($_SESSION){

     header('location:home.php');
 }
?>
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/recuperacao.css">
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section>
        <form action="includes/logica/logica.php" method="post">
            <input type="text" name='email' placeholder='email'>
            <input type="submit" value="ok" name='recuperarSenha'>
        </form>
    </section>
</main>
</body>
</html>
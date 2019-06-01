<?php require('includes/componentes/cabecalho.php');
 if($_SESSION){

     header('location:home.php');
 }
?>
<link rel="stylesheet" href="assets/css/index.css">
<script src="assets/js/index.js"></script>
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section id='principal'>
        <form action="includes/logica/logica.php" method="post">
            <input type="text" name='email'>
            <input type="submit" value="ok" name='recuperarSenha'>
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
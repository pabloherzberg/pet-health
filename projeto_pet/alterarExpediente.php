<?php require('includes/componentes/cabecalho.php');
?>
<link rel="stylesheet" href="assets/css/home.css">
<script src="assets/js/home.js"></script>
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
   <?php
        $email = $_SESSION['email'];
        if(isset($email)){
            ?>
                <section>
                    <h2>Bem Vindo, <?php echo($_SESSION['nome']);?></h2>
                    <form action="includes/logica/logica.php" method="post">
                        <input type="time" name="inicio" placeholder='hh:mm'>
                        <input type="time" name="fim" placeholder='hh:mm'>
                        <input type="submit" value="ok" name='alterarExpediente'>
                    </form>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
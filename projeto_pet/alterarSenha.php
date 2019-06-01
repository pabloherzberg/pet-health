<?php require('includes/componentes/cabecalho.php');
    $senha = $_GET['senha'];
    $email = $_GET['email'];
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
            <input type="text" name='senha' placeholder='nova senha'>
            <input type="hidden" name="email" value='<?php echo($email)?>'>
            <input type="submit" value="ok" name='alterarSenha'>
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
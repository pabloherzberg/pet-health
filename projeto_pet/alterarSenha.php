<?php require('includes/componentes/cabecalho.php');
    $senha = $_GET['senha'];
    $email = $_GET['email'];
?>
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/alterarSenha.css">
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section>
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
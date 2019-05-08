<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <h1>Bem vind@,</h1>
    <p><?php echo($_SESSION['nome']); ?></p>
    
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
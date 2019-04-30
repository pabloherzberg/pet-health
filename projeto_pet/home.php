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
    <nav>
        <a href="addPet.php">Adicionar Pet</a>
        <a href="addPet.php">Pets</a>
        <a href="historico.php">Históricos</a>
        <a href="alterarUsuario.php">Alterar cadastro</a>
        <a href="calendario.php">Checar calendário</a>
        <a href="inserirMedicamento.php">Add medicamento</a>
    </nav>
    
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
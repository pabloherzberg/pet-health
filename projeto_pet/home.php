<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section>
        <h1>Bem vind@,</h1>
        <p><?php echo($_SESSION['nome']); ?></p>
    </section>
    <?php
        $email = $_SESSION['email'];
        $pets = listarPets($conexao, $email);
        foreach($pets as $pet){
            ?>
                <section>
                    <h3><?php echo($pet['nome_pet']);?></h3>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section>
        <h2>Bem vind@,</h2>
        <p><?php echo($_SESSION['nome']); ?></p>
    </section>
    <?php
        $email = $_SESSION['email'];
        $pets = listarPets($conexao, $email);
        foreach($pets as $pet){
            ?>
                <section>
                    <h2><?php echo($pet['nome_pet']);?></h2>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
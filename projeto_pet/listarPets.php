<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/listarPets.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <?php
        $email = $_SESSION['email'];
        $pets = listarPets($conexao, $email);
        if(empty($pets)){
            ?>
                <section>
                    <p>Você não possui nenhum bichinho ='(</p>
                    <p>Você sabia que pode adotar um animalzinho de outra pessoa por um tempo determinado? Clique aqui e sabia mais! =D</p>
                </section>
            <?php
        }
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
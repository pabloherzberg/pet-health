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
        $vets = listarVeterinarios($conexao);
        if(empty($vets)){
            ?>
                <section>
                    <p>Não há veterinários cadastrados.</p>
                </section>
            <?php
        }
        foreach($vets as $vet){
                 
            ?>
                <section>
                    <p>Nome: <?php echo $vet['nome']; ?></p>
                    <p>Email <?php echo $vet['email']; ?></p>
                    <p>Telefone: <?php echo $vet['telefone']; ?></p>
                    <p>Início do expediente: <?php echo $vet['inicio_expediente']; ?></p>
                    <p>Final do expediente: <?php echo $vet['fim_expediente']; ?></p>
                                        
                    </form>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
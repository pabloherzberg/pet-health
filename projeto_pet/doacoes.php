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
        $pets = listarPetsDoados($conexao, $email);//fazer essa função
        if(empty($pets)){
            ?>
                <section>
                    <p>Você não possui nenhum bichinho sob os cuidados de outra pessoa</p>
                </section>
            <?php
        }
        foreach($pets as $pet){
           
            ?>
                <section>
                    <h2>Nome: <?php echo $pet['nome_pet']; ?></h2>
                    <form action="historico.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="verHistorico" value="Visualizar histórico"/>
                    </form> 
                    
                    <!-- colocar um if aqui para aparecer esse botão apenas para doações temporárias -->
                    <form action="includes/logica/logica.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="removerPetDoacao" value="Remover Doação"/>
                    </form>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
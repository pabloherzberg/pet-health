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
                    <p>Você não possui um bichinho sob os cuidados de outra pessoa.</p>
                </section>
            <?php
        }
        foreach($pets as $pet){
           
            ?>
                <section>
                    <p>Nome do Pet: <?php echo $pet['nome_pet']; ?></p>
                    <p>Email do cuidador: <?php echo $pet['email_receptor']; ?></p>
                    <p>Telefone do cuidador: <?php //echo $pet['nome_pet']; ?></p>
                    <p>Início dos cuidados: <?php echo $pet['data_doacao']; ?></p>
                    <p>Data final dos cuidados: <?php echo $pet['data_devolucao']; ?></p>
                    <form action="historico.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="verHistorico" value="Visualizar histórico"/>
                    </form> 
                    
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
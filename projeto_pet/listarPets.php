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
            $dt_nasc = $pet['dt_nascimento'];
            $idade = idadePet($dt_nasc);
            ?>
                <section>
                    <div id='nomeFotoPet'>
                        <span><?php echo $pet['nome_pet']; ?></span>
                        <img src="assets/img/<?= $pet['foto']?>" width="80px" height="120px">
                    </div>
                    <p><?php echo $idade;?> anos</p>
                    <p>Nascimento: <?php echo $pet['dt_nascimento']; ?></p>
                    <p>Raça: <?php echo $pet['raca']; ?></p>
                    <form action="historico.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="verHistorico" value="Visualizar histórico"/>
                    </form> 
                    
                    <form action="alteraPet.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="atualizaPet" value="Atualizar Cadastro Pet"/>
                    </form>
                    <form action="includes/logica/logica.php" method="post">
                        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                        <input type="submit" class="btn cadastro" name="removerPet" value="Remover Pet"/>
                    </form>
                </section>
            <?php
        }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
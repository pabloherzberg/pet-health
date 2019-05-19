<?php
    include_once("includes/componentes/cabecalho.php");
    $email = $_POST['email'];
?>

<link rel="stylesheet" href="assets/css/index.css">
    <title>Buscar Pet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
    <main>
        <p><a href="buscarPet.php">Voltar</a></p>
        <div id='pets'>
         <?php
            
            $pets = listarPets($conexao, $email);

                foreach($pets as $pet):
                
        ?>
        <div>
            <p>Nome: <?php echo $pet['nome_pet']; ?></p>
                <form action="includes/logica/logica.php" method="post">
                <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
            </form>
               
            <form action="historico.php" method="post">
                <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
                <input type="hidden" name="email_dono" value="<?=$pet['email_dono']?>" />
                <input type="submit" class="btn cadastro" name="verHistorico" value="Visualizar histórico"/>
            </form> 
        </div>
        <?php
            endforeach;

        ?>      
        </div>
    </main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
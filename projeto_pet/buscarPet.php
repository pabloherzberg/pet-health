<?php
    include_once("includes/componentes/cabecalho.php");
?>

<link rel="stylesheet" href="assets/css/index.css">
    <title>Buscar Pet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
    <main>
        <form action="includes/logica/logica.php" method="post">
            <div id="">
                Email do dono:<input type="text" name="email" placeholder="email do dono">
                
                <input type="submit" class="btn cadastro" name="buscarPet" value="buscar">
            </div>
        </form>
        <div id='pets'>
         <?php
            $email = $_SESSION['email'];//alterar para pegar o email do dono 
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
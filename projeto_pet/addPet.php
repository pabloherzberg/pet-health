<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
<main>
<nav>
<a href="home.php">Home</a>
</nav>
<?php
    $email = $_SESSION['email'];
    $pets = listarPets($conexao, $email);

        foreach($pets as $pet):
    $dt_nasc = $pet['dt_nascimento'];
    $idade = idadePet($dt_nasc);

?>
<div>
     <p>Nome: <?php echo $pet['nome_pet']; ?></p>
     <p><?php echo $idade; ?> anos</p>
     <p>Nascimento: <?php echo $pet['dt_nascimento']; ?></p>
     <p>Raça: <?php echo $pet['raca']; ?></p>
     <form action="includes/logica/logica.php" method="post">
        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
        <input type="hidden" name="nome_pet" value="<?=$pet['nome_pet']?>" />
        <input type="hidden" name="dt_nascimento" value="<?=$pet['dt_nascimento']?>" />
        <input type="hidden" name="raca" value="<?=$pet['raca']?>" />
    </form>
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
</div>
<?php
    endforeach;

?>

    <form action="includes/logica/logica.php" method="post">
        <input type="text" name="nome" placeholder="nome do Pet">
        <input type="text" name="raca" placeholder="raça do Pet">
        <input type="date" name="dt_nascimento">
        <input type="submit" class="btn cadastro" name='inserirPet' value="Inserir pet">
    </form>
    
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
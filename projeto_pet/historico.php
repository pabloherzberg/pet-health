<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
    <title>Histórico</title>
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
    $codPet = $_POST['cod_pet'];
    $pet = buscaPet($conexao, $email, $codPet);

?>
<div>
     <p>Nome: <?php echo $pet['nome_pet']; ?></p>
     <p>Nascimento: <?php echo $pet['dt_nascimento']; ?></p>
         
</div>
    <form action="alteraHistorico.php" method="post">
        <input type="hidden" name="cod_pet" value="<?=$pet['cod_pet']?>" />
        <input type="submit" class="btn cadastro" name="atualizaHistorico" value="Adicionar Medicamento"/>
    </form>
    
    <form action="includes/logica/logica.php" method="post">
        <textarea type="text" name="observacao" placeholder="Observação"></textarea>
        <input type="submit" class="btn cadastro" name='inserirObs' value="Inserir Observação">
    </form>
    
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
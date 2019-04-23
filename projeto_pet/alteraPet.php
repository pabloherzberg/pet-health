<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
    <title>Atualizar Pet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
<main>
<?php
    $email = $_SESSION['email'];
    $codPet = $_POST['cod_pet'];
    $pet = buscaPet($conexao, $email, $codPet);
?>
    <p>Alterando cadastro do Pet</p>
<form action="includes/logica/logica.php" method="post">
    <input type="hidden" name="cod_pet" value="<?= $pet['cod_pet']?>" />
     <input type="text" name="nome_pet" value="<?= $pet['nome_pet'] ?>">
     <input type="date" name="dt_nascimento" value="<?=  $pet['dt_nascimento'] ?>">   
     <input type="submit" name="atualizaPet" value="Atualizar Cadastro Pet"/>  
</form>
    
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
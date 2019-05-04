<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="assets/js/jquery/historico.js"></script>
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
    <button id='botao' class="btn cadastro" onclick='criarFormHist()'>Adicionar Medicamento</button>
    <div id="formulario">
    </div> 

            
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
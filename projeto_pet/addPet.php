<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="assets/js/addPet.js"></script>
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
<button id='botao'  onclick='criarFormPet()'>Adicionar Pet</button>
<div id="formulario">
</div>  

</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
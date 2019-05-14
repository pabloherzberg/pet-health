<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="assets/js/historico.js">

  </script>
    <title>Buscar Pets</title>
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
    
   ?>
<div>
     <form action="includes/logica/logica.php">
        <input type="text">
        <button></button>
     </form>
         
</div>
                
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
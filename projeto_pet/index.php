<?php require('includes/componentes/cabecalho.php');
 if($_SESSION){

     header('location:home.php');
 }
?>
<link rel="stylesheet" href="assets/css/index.css">
<script src="assets/js/jquery/index.js"></script>
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <div>
        <button onclick='logar()' id='logar'>Logar</button>
        <button onclick='cadastrar()' id='cadastrar'>Cadastrar</button>
        <div id='formulario'></div>
    </div>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
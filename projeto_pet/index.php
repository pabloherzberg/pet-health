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
    <section id='principal'>
        <button onclick='logar()' id='logar'>Logar</button>
        <button onclick='cadastrar()' id='cadastrar'>Cadastrar</button>
        <div id='formulario'></div>
    </section>
    <section class='texto'>
        <h2>Dono de Pet?</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam repudiandae illum dolore sint quod, incidunt soluta dolorem a, omnis officiis consequuntur possimus maiores rem! Dolor iure delectus aspernatur sapiente voluptatum?</p>
    </section>
    <section class='texto'>
        <h2>Veterinário?</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nostrum quidem tempora dolore incidunt labore natus repellat soluta accusamus sequi, velit, ab laudantium. Similique expedita veritatis voluptas labore, esse sunt.</p>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
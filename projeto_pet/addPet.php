<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
    <title>addPet</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
<main>
  <section>
    <form action="includes/logica/logica.php" method="post">
      <input type="text" name='nome' placeholder='nome'>
      <input type="text" name='raca' placeholder='raça'>
      <input type="date" name='dt_nascimento' placeholder='idade'>
      <input type="submit" value='cadastrar' name='inserirPet'>
    </form>
  </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
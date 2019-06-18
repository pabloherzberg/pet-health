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
    <form id = 'formPet' action="includes/logica/logica.php" method="post" enctype='multipart/form-data'>
      <input type="text" name='nome' placeholder='nome'>
      <input type="text" name='raca' placeholder='raça'>
      <input type="date" name='dt_nascimento' placeholder='idade'>
      <input type="file" name="foto" placeholder='foto do seu animalzinho'>
      <input type="submit" value='cadastrar' name='inserirPet'>
      <input type="reset" value="limpar" />
    </form>
  </section>
</main>
<script>
    $(document).ready(function(){
        $("#formPet").submit(function(){
        alert("Animal cadastrado!");
        });

        }) 

    
    </script>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
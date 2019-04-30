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
    $medicamento = buscarMedicamento($conexao,null,'ver');
    
?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
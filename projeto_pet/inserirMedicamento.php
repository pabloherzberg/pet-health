<?php
    include_once("includes/componentes/cabecalho.php");
?>

<link rel="stylesheet" href="assets/css/index.css">
    <title>Cadastro de Medicamento</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
    <main>
        <form action="includes/logica/logica.php" method="post">
            <div id="">
                Nome:<input type="text" name="nome" placeholder="nome">
                Validade:<input type="date" name="validade" >
                <input type="submit" class="btn cadastro" name="cadastrarMedicamento" value="Cadastrar Medicamento">
            </div>
        </form>
    </main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
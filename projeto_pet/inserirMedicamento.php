<?php
    include_once("includes/cabecalho.php");
?>

<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
    <title>Cadastro de Medicamento</title>
</head>
<body>
    <header>
        <figure>
            <img id="logo" src="assets/img/logo.png" alt="logo da empresa">
        </figure>
    </header>
    <main>
        <form action="includes/query.php" method="post">
            <div id="">
                <input type="text" class='hide' name="nome" placeholder="nome">
                <input type="date" name="validade" >
                <input type="button" class="btn cadastro" id="cadastrarMedicamento" value="Cadastrar Medicamento">
            </div>
        </form>
    </main>
    <footer>   
        <p>Patrocinadores:</p>
    </footer>
</body>
</html>
<?php
 include_once('includes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet&Health</title>
</head>
<body>
    <header>
        <figure>
            <img id="logo" src="assets/img/logo.png" alt="logo da empresa">
        </figure>
    </header>
    <main>
    <h1>Bem vind@,</h1>
    <p><?php echo($_SESSION['nome']); ?></p>
    <nav>
        <a href="addPet.php">Adicionar Pet</a>
        <a href="listarPet.php">Pets</a>
        <a href="historico.php">Históricos</a>
        <a href="alteraCadastro">Alterar cadastro</a>
        <a href="calendario.php">Checar calendário</a>
    </nav>
    
    </main>
    <footer>   
        <p>Patrocinadores:</p>
    </footer>
</body>
</html>
<?php
 include_once('includes/cabecalho.php');
?>
    <title>Document</title>
</head>
<body>
    <h1>bem vindo</h1>
    <p><?php echo($_SESSION['nome'].' '.$_SESSION['email']) ?></p>
    <a href="addPet.php">add pet</a>
</body>
</html>
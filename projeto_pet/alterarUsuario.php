<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>

    <nav>
        <a href="addPet.php">Adicionar Pet</a>
        <a href="listarPet.php">Pets</a>
        <a href="historico.php">Históricos</a>
        <a href="alteraCadastro">Alterar cadastro</a>
        <a href="calendario.php">Checar calendário</a>
    </nav>
    <form action="includes/logica/logica.php" method="post">
        <input type="text" name="nome" placeholder="NOME: <?php echo($_SESSION['nome'])?>">
        <input type="text" name="email" placeholder="EMAIL: <?php echo($_SESSION['email'])?>">
        <input type="text" name="senha" placeholder="SENHA: <?php echo($_SESSION['senha'])?>">
        <input type="text" name="endereco" placeholder="ENDEREÇO: <?php echo($_SESSION['endereco'])?>">
        <input type="text" name="telefone" placeholder="TELEFONE: <?php echo($_SESSION['telefone'])?>">
        <input type="submit" id='enviar' name='alterar' value="Enviar">            
    </form>
</main>
<?php require('includes/componentes/footer.php');?>
<script>
    //caso possua CRMV significa que é usuário. Então o input para alterar o CRMV será incluído no formulário;
    const veterinario = <?php echo($_SESSION['crmv']);?>;
    $(document).ready(
        function(){
            if(veterinario){
                $('#enviar').before("<input type='text' id='crmv' name='crmv' placeholder='CRMV: <?php echo($_SESSION['crmv'])?>'>");
            }
        }
    );
</script>
</body>
</html>
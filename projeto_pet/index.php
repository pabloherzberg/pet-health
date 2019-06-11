<?php require('includes/componentes/cabecalho.php');
 if($_SESSION){

     header('location:home.php');
 }
?>
<link rel="stylesheet" href="assets/css/index.css">
<script src="assets/js/index.js"></script>
<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <section  class='texto'>
        <h2>Dono de Pet?</h2>
        <p>Pet&Health permite que você cadastre e mantenha o histórico de saúde de todos os seus animais de estimação. Além disso, é possível consultar o contato e os horários de expediente de veterinários cadastrados. Ademais, a funcionalidade "Transferir Pet" permite que você doe um animal ou registre e compartilhe informações de histórico com outro usuário. </p>
    </section>
    <section class='texto'>
        <h2>Veterinário?</h2>
        <p>Pet&Health permite que você compartilhe o seu contato, assim como os seus horários de expediente. Ademais, você pode buscar um animal de estimação e obter o seu histórico a partir do email do dono e, assim, inserir informações pertinentes à consulta realizada. Também, o registro de animais de estimação bem como as demais funcionalidades do sistema estão disponíveis para usuários veterinários.</p>
    </section>
    <section id='principal'>
        <button onclick='logar()' id='logar'>Logar</button>
        <button onclick='cadastrar()' id='cadastrar'>Cadastrar</button>
        <a href="recuperacao.php">Esqueci a senha</a>
        <div id='formulario'></div>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
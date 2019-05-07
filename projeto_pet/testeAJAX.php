<?php
 include_once('includes/componentes/cabecalho.php');
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <h1>Bem vind@,</h1>
    <p><?php echo($_SESSION['nome']); ?></p>
    <nav>
        <a href="addPet.php">Adicionar Pet</a>
        <a href="addPet.php">Pets</a>
        <a href="selecionaHistorico.php">Históricos</a>
        <a href="alterarUsuario.php">Alterar cadastro</a>
        <a href="calendario.php">Checar calendário</a>
        <a href="inserirMedicamento.php">Add medicamento</a>
    </nav>
    
</main>
<?php require('includes/componentes/footer.php');?>
<script>
    function inicializaAjax() {
        var ajax;
        if (window.XMLHttpRequest) {
            ajax= new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            ajax=new ActiveXObject("Msxml2.XMLHTTP");
            if (!ajax) {
                ajax=new ActiveXObject("Microsoft.XMLHTTP");
            }
        }  else {
            alert ("Seu navegador não suporta esta aplicação");
        }
        return ajax;
    }

    function requisitar(){
        var requisicaoAjax = inicializaAjax();
        if (requisicaoAjax) {
            requisicaoAjax.onreadystatechange = function() {
                if (requisicaoAjax.readyState == 4) {
                    if (requisicaoAjax.status==200) {
                        if (requisicaoAjax.responseText) {
                                var flag = [];
                                 flag = JSON.parse(requisicaoAjax.responseText);
                                alert(flag);
                                alert(flag[0]);
                                alert(flag[1]);
                                if(flag!=null)
                                {
                                    mudacor();

                                }
                        }
                         //else {
                       //     cidades.innerHTML = "Selecione o estado";
                     //   }
                    }
                    else {
                        alert("Problema na Comunicação");
                    }
                }
            }
        }
    requisicaoAjax.open("GET", "testeAJAXconteudo.php");
    requisicaoAjax.send(null);
    }
    window.onload = requisitar;
    function mudacor()
    {
        const body = document.body;
        const root = document.documentElement;
        root.style.setProperty('--principal', 'red');
        body.style.backgroundImage ='url(null)';
    }
</script>
</body>
</html>
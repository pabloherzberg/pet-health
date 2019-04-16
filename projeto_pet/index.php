<?php require('includes/componentes/cabecalho.php');

 if($_SESSION){

     header('location:home.php');
 }
?>
<link rel="stylesheet" href="assets/css/index.css">

<title>Pet&Health</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
        <form action="includes/logica/logica.php" method="post">
            <div id="tela_selecionar" class="hide" >
                    <div class="btn" value='dono' id="btn_dono_pet">
                        <label for="btn_dono_pet">Dono Pet</label>
                    </div>                
                    <div class="btn" value='veterinário' id="btn_veterinario">
                        <label for="btn_veterinario">Veterinário</label>
                    </div>
                </div>
            <div id="campos_preencher">
                <input type="text" class='hide' name="nome" placeholder="nome">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="senha" placeholder="senha">
                <input type="text" class='hide' name="endereco" placeholder="endereço">
                <input type="text" class='hide' name="telefone" placeholder="telefone">
                <input type="submit" class="btn" id='acessar' name='acessar' value="login">
                <input type="button" class="btn cadastro" id="cadastrar" value="Cadastrar">
                <input type="submit"class="hide btn" id='enviar' name='enviar' value="Enviar">
            </div>
        </form>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
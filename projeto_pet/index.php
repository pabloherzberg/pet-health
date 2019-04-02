<?
 include_once('includes/cabecalho.php');
 if($_SESSION){
     header('location:home.php');
 }
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Document</title>
</head>
<body class="corpo">
    <header class="header">
        <figure>
            <img id="logo" src="assets/img/logo.png" alt="logo da empresa">
        </figure>
    </header>
    <section class="form">
        <form action="includes/query.php" method="post">
            <div id="tela_selecionar" class="hide" >
                    <div class="btn" value='dono' id="btn_dono_pet">
                        <label for="btn_dono_pet">Dono Pet</label>
                    </div>                
                    <div class="btn" value='veterinário' id="btn_veterinario">
                        <label for="btn_veterinario">Veterinário</label>
                    </div>
                </div>
            <div id="campos_preencher">
                <input type="text" class='hide campo' name="nome" placeholder="nome">
                <input class="campo" type="text" name="email" placeholder="emaill">
                <input class="campo" type="text" name="senha" placeholder="senha">
                <input type="text" class='hide campo' name="endereco" placeholder="endereço">
                <input type="text" class='hide campo' name="telefone" placeholder="telefone">
                <input class="botao_login" type="submit" id='acessar' name='acessar' value="login">
                <input class="botao_cadastrar" type="button" id="cadastrar" value="Cadastrar">
                <input type="submit" id='enviar' class="hide botao_enviar" name='enviar' value="Enviar">
            </div>
        </form>
    </section>
    <footer class="footer">
        <figure>
            <img class="email rodape" src="assets/img/email.png" alt="ícone de email">
        </figure>
        <figure>
            <img class="instagram rodape" src="assets/img/instagram.png" alt="ícone de instagram">
        </figure>
         <figure>
            <img class="facebook rodape" src="assets/img/facebook.png" alt="ícone do facebook">
         </figure>
         <figure>
         <img class="twitter rodape" src="assets/img/twitter.png" alt="ícone de twitter">
         </figure>   
    </footer>
</body>
</html>
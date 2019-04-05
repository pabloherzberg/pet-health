<?php
 include_once('includes/cabecalho.php');
 /*if($_SESSION){
     header('location:home.php');
 }*/
?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <figure>
            <img id="logo" src="assets/img/logo.png" alt="logo da empresa">
        </figure>
    </header>
    <main>
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
                <input type="text" class='hide' name="nome" placeholder="nome">
                <input type="text" name="email" placeholder="emaill">
                <input type="text" name="senha" placeholder="senha">
                <input type="text" class='hide' name="endereco" placeholder="endereço">
                <input type="text" class='hide' name="telefone" placeholder="telefone">
                <input type="submit" class="btn" id='acessar' name='acessar' value="login">
                <input type="button" class="btn cadastro" id="cadastrar" value="Cadastrar">
                <input type="submit"class="hide btn" id='enviar' name='enviar' value="Enviar">
            </div>
        </form>
    </main>
    <footer>   
        <p>Patrocinadores:</p>
    </footer>
</body>
</html>
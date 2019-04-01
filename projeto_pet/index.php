<?
 include_once('includes/start.php');
 if($_SESSION){
     header('location:home.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/jquery/index.js"></script>
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
                <input type="text" class='hide' name="nome" placeholder="nome">
                <input type="text" name="email" placeholder="emaill">
                <input type="text" name="senha" placeholder="senha">
                <input type="text" class='hide' name="endereco" placeholder="endereço">
                <input type="text" class='hide' name="telefone" placeholder="telefone">
                <input type="submit" id='acessar' name='acessar' value="Acessar">
                <input type="button" id="cadastrar" value="Cadastrar">
                <input type="submit" id='enviar' class="hide" name='enviar' value="Enviar">
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
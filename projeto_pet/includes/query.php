<?php
    require_once('conecta.php');
    require_once('funcoes.php');

/*condição para quando o botão ENVIAR do CADASTRO USUARIO for pressionado*/
    if(isset($_POST['enviar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        if(isset($_POST['crmv'])){
            /*Condição para quando for selecionado o botão veterinário*/            
            $crmv = $_POST['crmv'];
            $array = array($nome, $email, $senha, $endereco, $telefone, $crmv);
        }
        else{
            /*Condição para quando for selecionado o botão dono pet */
            $array = array($nome, $email, $senha, $endereco, $telefone);
        }
        inserirUsuario($conexao, $array);
        header('location:../index.html');
    }
/*condição para quando o botão ACESSAR do CADASTRO USUARIO for pressionado */
    if(isset($_POST['acessar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        session_start();
        $_SESSION = buscarUsuario($conexao,$email,$senha);
        if($_SESSION){
            header('location:../home.php');
        }
        else{
            header('location:../index');
        }
    }
/*condição para quando o botão INSERIR PET for pressionado*/
    if(isset($_POST['inserirPet'])){
        $nomePet = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        echo($dt_nascimento);
        session_start();
        inserirPet($conexao, $nomePet, $dt_nascimento, $_SESSION['email']);
        header('location:../home.php');
    }

?>
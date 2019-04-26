<?php
    require_once('conecta.php');
    require_once('funcoes.php');
#CADASTRO USUÁRIO
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
        header('location:../index.php');
    }
#ACESSAR USUARIO
    if(isset($_POST['acessar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        session_start();
        $_SESSION = buscarUsuario($conexao,$email,$senha);
        if($_SESSION){
            header('location:../../home.php');
        }
        else{
            header('location:../../index.php');
        }
    }
#DESLOGAR USUARIO
    if(isset($_POST['deslogar'])){
        session_start();            //iniciar a sessão
        session_destroy();          //destruir a sessão
        session_unset();            //limpar as variáveis globais da sessão
        header('Location:../../index.php');
    }
#INSERIR PET
    if(isset($_POST['inserirPet'])){
        $nomePet = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        echo($dt_nascimento);
        session_start();
        inserirPet($conexao, $nomePet, $dt_nascimento, $_SESSION['email']);
        header('location:../home.php');
    }

#INSERIR MEDICAMENTO
    if(isset($_POST['inserirMedicamento'])){
        $nomeMedicamento = $_POST['nome'];
        $dt_validade= $_POST['validade'];
        inserirMedcamento($conexao, $nomeMedicamento, $dt_validade);
        header('location:../historico.php');
    }

    

?>
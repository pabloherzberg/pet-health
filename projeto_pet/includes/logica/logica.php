<?php
    require_once('conecta.php');
    require_once('funcoes.php');
#CADASTRO USUÁRIO
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaEncriptada = base64_encode($senha);
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        if(isset($_POST['crmv'])){
            /*Condição para quando for selecionado o botão veterinário*/            
            $crmv = $_POST['crmv'];
            $inicio = $_POST['inicio_expediente'];
            $fim = $_POST['fim_expediente'];
            $array = array($nome, $email, $senhaEncriptada, $endereco, $telefone, $crmv, $inicio, $fim);
        }
        else{
            /*Condição para quando for selecionado o botão dono pet */
            $array = array($nome, $email, $senhaEncriptada, $endereco, $telefone);
        }
        inserirUsuario($conexao, $array);
        header('location:../../index.php');
    }
#ACESSAR USUARIO
    if(isset($_POST['logar'])){
        $email = addslashes($_POST['email']);//impede que o sql seja alterado
        $senha = $_POST['senha'];
        $senhaEncriptada = base64_encode($senha);
        session_start();
        $_SESSION = buscarUsuario($conexao,$email,$senhaEncriptada);
        if($_SESSION){
            header('location:../../home.php');
        }
        else{
            header('location:../../index.php');
        }
    }
#ALTERAR USUÁRIO
    if(isset($_POST['alterar'])){
        session_start();
        if(empty($_POST['nome'])){
            $nome = $_SESSION['nome'];
        }
        else{
            $nome = $_POST['nome'];
        }
        $email = $_SESSION['email'];
        if(empty($_POST['senha'])){
            $senha = $_SESSION['senha'];
        }
        else{
            $senha_fraca = $_POST['senha'];
            $senha = base64_encode($senha_fraca);
        };
        if(empty($_POST['endereco'])){
            $endereco = $_SESSION['endereco'];
        }
        else{
            $endereco = $_POST['endereco'];
        };
        if(empty($_POST['telefone'])){
            $telefone = $_SESSION['telefone'];
        }
        else{
            $telefone = $_POST['telefone'];
        }     
        $array = array($nome, $senha, $endereco, $telefone);
        alterarUsuario($conexao, $array, $email);
        $_SESSION = buscarUsuario($conexao, $email, $senha);
        header('location:../../index.php');
    }
#DELETAR USUARO
    if(isset($_POST['deletarUsuario'])){
        session_start();
        $email = $_SESSION['email'];
        deletarUsuario($conexao, $email);
        session_destroy();
        session_unset();
        header('Location:../../index.php');
    }
#DESLOGAR USUARIO
    if(isset($_POST['deslogar'])){
        session_start();            //iniciar a sessão
        session_destroy();          //destruir a sessão
        session_unset();            //limpar as variáveis globais da sessão
        header('Location:../../index.php');
    }
#RECUPERAR SENHA
    if(isset($_POST['recuperarSenha'])){
        $email = $_POST['email'];
        recuperarSenha($conexao, $email);
    }
#ALTERAR SENHA
    if(isset($_POST['alterarSenha'])){
        $senha_fraca = $_POST['senha'];
        $senha = base64_encode($senha_fraca);
        $email = $_POST['email'];
        $array = array($senha,$senha_fraca,$email);
        echo("<pre>");
        var_dump($array);
        alterarSenha($conexao, $email, $senha);
        session_start();
        $_SESSION = buscarUsuario($conexao,$email,$senha);
        if(isset($_SESSION)){
            header('Location:../../index.php');
        }
    }
#INSERIR PET
    if(isset($_POST['inserirPet'])){
        $nomePet = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $raca=$_POST['raca'];
        $foto = $_FILES['foto']['name']; 
        $arquivo_temporario=$_FILES['foto']['tmp_name'];
        session_start();
        $email = $_SESSION['email'];
        // echo($arquivo_temporario);
        // die;
        if (!empty($foto)) {
            if (move_uploaded_file($arquivo_temporario, "../../assets/img/$foto")) {
            echo " Upload do arquivo: ". $foto."concluído com sucesso";
            }
            else {
            die( "Falha no envio do arquivo");
            }
           }
           else{
           die("Selecione o arquivo a ser enviado");
            }
            $array = array($nomePet, $dt_nascimento,$raca, $email, $foto);
            inserirPet($conexao, $array);
            header('location:../../home.php');
    
    }

#REMOVER PET
    if(isset($_POST['removerPet'])){
        $codPet = $_POST['cod_pet'];
        removerPet($conexao, $codPet);
        header('location: ../../addPet.php');
    }

#ATUALIZAR PET
    if(isset($_POST['atualizaPet'])){
        $codPet = $_POST['cod_pet'];
        $nomePet = $_POST['nome_pet'];
        $nasc = $_POST['dt_nascimento'];
        $raca=$_POST['raca'];
        $foto = $_FILES['foto']['name']; 
        $arquivo_temporario=$_FILES['foto']['tmp_name'];

        if (!empty($foto)) {
            if (move_uploaded_file($arquivo_temporario, "../../assets/img/$foto")) {
            echo " Upload do arquivo: ". $foto."concluído com sucesso";
            }
            else {
            die( "Falha no envio do arquivo");
            }
           }
           else{
           die("Selecione o arquivo a ser enviado");
            }
       $array = array($nomePet, $nasc,$raca, $foto, $codPet);
       $pet = atualizarPet($conexao, $array);
        header('location: ../../listarPets.php');
    }
#INSERIR MEDICAMENTO
    if(isset($_POST['cadastrarMedicamento'])){
        $nomeMedicamento = $_POST['nome'];
        $dt_validade= $_POST['validade'];
        inserirMedicamento($conexao, $nomeMedicamento, $dt_validade);
        header('location:../../home.php'); // -------->>> mudar isso para histórico posteriormente
    }

#ALTERAR EXPEDIENTE
    if(isset($_POST['alterarExpediente'])){
        session_start();
        $email = $_SESSION['email'];
        $inicio = $_POST['inicio'];
        $fim_expediente = $_POST['fim'];
        alterarExpediente($conexao,$email,$inicio,$fim_expediente);
        header('location:../../home.php');
    }
//funções do HISTÓRICO
#INSERIR MEDICAMENTO NO HISTÓRICO 
    if(isset($_POST['inserirHistorico'])){
        $codPet = $_POST['cod_pet'];
        $nomeMedicamento = $_POST['nome'];
        $dataHist=$_POST['dt_historico'];
        $hora=$_POST['hora'];
        $observacoes = $_POST['observacoes'];
        session_start();
        $email = $_SESSION['email'];
        $crmv = $_SESSION['crmv'];
        if(isset($crmv)){
            $flagVet = 1;
        }
        else{
            $flagVet = 0;
        }
        inserirHistorico($conexao,$dataHist,$observacoes, $flagVet, $codPet, $hora, $nomeMedicamento);
        header('location:../../home.php');
    }

#ALTERAR HISTÓRICO

#BUSCAR HISTÓRICO
    if(isset($_POST['buscarPet'])){
        $emailDono = $_POST['email'];
        session_start();
        $email = $_SESSION['email'];
        listarPets($conexao, $email);
        header('location: ../../listaPetsBusca.php');
    }
#TRANSFERIR HISTÓRICO
    if(isset($_POST['transferirHistorico'])){
        $emailReceptor = $_POST['email_receptor'];
        $codPet = $_POST['cod_pet'];
        $dataDoacao = $_POST['data_doacao'];
        $dataDevolucao = $_POST['data_devolucao'];
        $tipoDoacao = $_POST['tipoDoacao'];
        session_start();
        $emailDono = $_SESSION['email'];
        
        transferirPet($conexao, $emailReceptor, $codPet, $dataDoacao,$dataDevolucao, $tipoDoacao, $emailDono);
        header('location: ../../doacoes.php');
    }
#REMOVER TRANSFERÊNCIA DE PET
    if(isset($_POST['removerPetDoacao'])){
        $codPet =$_POST['cod_pet'];
        removerPetDoacao($conexao, $codPet);
        header("location: ../../doacoes.php");
    }
?>
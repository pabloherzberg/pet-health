<?php
    //identificação para a chamada da classe
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    // Inclui os arquivos PHPMailer.php e Exception.php e SMTP.php localizados na pasta PHPMailer/src

    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/SMTP.php";

    function inserirUsuario($conexao,$array){
        if(count($array)==6){
            $usuarios = $conexao->prepare("insert into usuario(nome, email, senha, endereco, telefone, crmv) values (?, ?, ?, ?, ?, ?)");
            $query = $usuarios->execute($array);
        }
        else{
            $usuarios = $conexao->prepare("insert into usuario(nome, email, senha, endereco, telefone) values (?, ?, ?, ?, ?)");
            $query = $usuarios->execute($array);
        }
        return $query;
        /*Se o array possuir 6 posições é pq inclui o CRMV, logo o usuário é um VETERINÁRIO*/
    }

    function buscarUsuario($conexao,$email, $senha){
        $array = array($email, $senha);
        $usuarios = $conexao->prepare("select * from usuario where email= ? and senha= ? ");
        if($usuarios->execute($array)){
            $usuario = $usuarios->fetch(); //coloca os dados num array $usuario
            return $usuario;
        }
        else{
            return false;
        }
    }

    function tipoUsuario($conexao,$emailMedica){
        $array = array($emailMedica);
        $tipos = $conexao->prepare("select crmv from usuario where email= ? ");
        $tipos->execute($array);
        $tipo = $tipos->fetch(); 
        return $tipo;
    }

    function alterarUsuario($conexao, $array, $email){
        $usuarios = $conexao->prepare("update usuario set nome= ?, senha= ?, endereco= ?, telefone= ? where email = '$email'");
        $query = $usuarios->execute($array);   
        return $query;
    }
    function deletarUsuario($conexao, $email){
        $deletar = $conexao->prepare("delete from usuario where email = '$email'");
        $query = $deletar->execute();
        return $query;
    }
    function recuperarSenha($conexao,$email){
        $usuario = $conexao->prepare("select * from usuario where email ='$email'");
        $usuario->execute();
        $array = $usuario->fetch();
        if($email = $array[0]){
            $senha_nova= substr(md5(microtime()),1,rand(8,12));
            $array_novo = array($array['nome'], $senha_nova,  $array['endereco'],  $array['telefone']);
            echo '<pre>';
            var_dump($array_novo);
            //die;
            alterarUsuario($conexao, $array_novo, $email);     

            // instanciando a classe
                $mail = new PHPMailer();  
                
            //  opçao de idioma, setado como br	
                $mail->SetLanguage("br"); 

            // habilitando SMTP	
                $mail->IsSMTP(); 

            // enviando como HTML
                $mail->IsHTML(true); 
                
            // Pode ser: 0 = não exibe erros, 1 = exibe erros e mensagens, 2 = apenas mensagens	
                $mail->SMTPDebug = 0;  
                
            // habilitando autenticação	
                $mail->SMTPAuth = true;  
                
            // habilitando tranferêcia segura (obrigatório)	
                $mail->SMTPSecure = 'tls'; 


            // Configurações para utilização do SMTP do Gmail  

                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 587; // Porta de envio de e-mails do Gmail

                $mail->Username = 'pet0e0health@gmail.com';

                $mail->Password = 'petehealth00';

                $mail->CharSet = "utf-8";

            // Remetente da mensagem

                $mail->SetFrom('pet0e0health@gmail.com');
                
            // Endereço de destino do email
                $mail->AddAddress($email); 

            // Assunto e Corpo do email

                $mail->Subject = "Recuperação de senha";

                $mail->Body = $senha_nova ;

            // Enviando o email

                if(!$mail->Send())

                {

                    $message = "PhpMailer Gmail status: " . $mail->ErrorInfo;
                    echo $message;
                    die;

                } 
        }
    }
// ------ FUNÇÕES PARA PETS --------
    function listarPets($conexao, $email){    
        $dados_pets = $conexao->prepare("SELECT * FROM pet WHERE email_dono = '$email'");      
        $dados_pets->execute();
        $query = $dados_pets->fetchAll();
        return $query;
    }
    function inserirPet($conexao, $array){
        $pet = $conexao->prepare("insert into pet (nome_pet, dt_nascimento, raca, email_dono) values (?,?,?,?)");
        $query = $pet->execute($array);
        return $query;
    }

    function removerPet($conexao, $codPet){
        $deletar = $conexao->prepare("delete from pet where cod_pet = '$codPet'");
        $query = $deletar->execute();
        return $query;
    }

    function atualizarPet($conexao, $array){
        $usuarios = $conexao->prepare("update pet set nome_pet = ?, dt_nascimento = ?, raca = ? where cod_pet = ?");
        $query = $usuarios->execute($array);
        return $query;
    }

    function buscaPet($conexao, $email, $codPet){
        $array = array($email, $codPet);
        $pets = $conexao->prepare("select * from pet where email_dono = ? and cod_pet= ?");
        if($pets->execute($array)){
            $pet = $pets->fetch();
            return $pet;
        }
        else{
            return false;
        }
    }

     function idadePet($dt_nasc){
        $now= new DateTime();
        $idade = $now->diff(new DateTime($dt_nasc));
       
        return $idade->y;
     }


     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     function inserirMedicamento($conexao, $nomeMedicamento, $dt_validade){
        $array = array($nomeMedicamento, $dt_validade);
        $medicamento = $conexao->prepare("insert into medicamentos (nome, validade) values (?,?)");
        $query = $medicamento->execute($array);
        return $query;
    }

    function removerMedicamento($conexao, $cod){
        $query = $conexao->prepare("delete from medicamentos where = '$cod'");
        return $query->execute();
    }

    function listarMedicamentos($conexao){
        $medicamentos = $conexao->prepare("SELECT * FROM medicamentos");      
        $medicamentos->execute();
        $query = $medicamentos->fetchAll();
        return $query;
    }
    
    function buscarMedicamento($conexao, $nomeMed){
        $medicamentos = $conexao->prepare("select cod_medicamento from medicamentos where lower(nome) like lower('%$nomeMed%')");
        $medicamentos->execute();
        $codMedicamento = $medicamentos->fetch();

        return $codMedicamento;
    }

   // ------ FUNÇÕES PARA MEDICAMENTOS e HISTORICOS ------
    function inserirHistorico($conexao,$dataHist,$observacoes, $pessoa, $codPet, $hora, $nomeMedicamento ){
        $array = array($dataHist, $observacoes,$pessoa,$codPet,$hora);
        $historico = $conexao->prepare("insert into historico (dt_historico, observacoes,flag_veterinario,cod_pet,hora) values (?,?,?,?,?)");
        $query = $historico->execute($array);        
        
        // pegar o cod do historico recém criado
       $horaHist = $hora;
        $codigo = buscarCodHist($conexao, $horaHist);
        $codHist = $codigo[0];
        
        //selecionar o código do medicamento
        $nomeMed = $nomeMedicamento;
        $medicamento = buscarMedicamento($conexao,$nomeMed);
        $codMedicamento = $medicamento[0];
        //inserir codigo do medicamento e do historico na tabela medicamento_historico
        inserirMedHist($conexao,$codMedicamento, $codHist);

        return $query;
    }

    function buscarCodHist($conexao, $horaHist){
        $horas = $conexao->prepare("select cod_historico from historico where hora like '$horaHist'");
        $horas->execute();
        $codHist = $horas->fetch();

        return $codHist;
    }

    function inserirMedHist($conexao,$codMedicamento, $codHist){
        $array = array($codMedicamento, $codHist);
        $medHist = $conexao->prepare("insert into medicamento_historico (cod_medicamento, cod_historico) values (?,?)");
        $query = $medHist->execute($array);
        return $query;
    }

    function buscarHistorico($conexao, $codPet){
        $dados = $conexao->prepare("select * from historico join medicamento_historico using(cod_historico) left join medicamentos on (medicamentos.cod_medicamento = medicamento_historico.cod_medicamento) where cod_pet = '$codPet'");
        $dados->execute();
        $historicos = $dados->fetchAll();
        
        return $historicos;
    }

    function buscarHistoricoRecente($conexao, $codPet){
        $dado = $conexao->prepare("select to_char(max(dt_historico), 'dd-mm-yyyy') from historico where cod_pet= '$codPet' and flag_veterinario = true");
        $dado->execute();
        $histRecente = $dado->fetch();
    
        return $histRecente;
    }

    function transferirPet($conexao, $emailReceptor, $codPet, $dataDoacao, $tipoDoacao, $emailDono){
        $verificaEmail = $conexao->prepare("select email from usuario where email = '$emailReceptor'");
        if($verificaEmail->execute() === true){
            if($tipoDoacao === 'T'){
                //inserir a doação na tabela Doacao
                $array = array($emailDono,$emailReceptor, $dataDoacao, $codPet, $tipoDoacao);
                $inserirDoacao = $conexao->prepare("insert into doacao (email_dono, email_receptor, data_doacao,cod_pet, tipo_doacao) values (?,?,?,?,?)");
                $inserirDoacao->execute($array);
            }else{
                //selecionar o animal na tabela Pet
                $pet = $conexao->prepare("select * from pet where cod_pet = '$codPet'");
                $pet->execute();
                $arrayPet = $pet->fetch();
                //transferir o historico dele para o novo dono
                //ver se é possível manter o pet com o mesmo código e mudar apenas o email do dono
                //inserir na tabela Pet com novo dono
                $arrayPet['email_dono'] = $emailReceptor; 
                $novoArray = array($arrayPet['nome_pet'], $arrayPet['dt_nascimento'],$arrayPet['email_dono'], $arrayPet['raca']);                           
                $novoDono = $conexao->prepare("insert into pet (nome_pet, dt_nascimento, email_dono, raca) values (?,?,?,?)");
                $novoDono->execute($novoArray);                
                
                //ARRUMAR A PARTIR DAQUI -----------!!!!!!!!!!!!!!!!
                //não deletar o pet do antigo dono: usar uma flag para o animal estar ou não com aquele dono
                //alterar isso tb na tabela pets
                //remover pet do antigo dono
                $query = $conexao->prepare("delete from pet where cod_pet = '$codPet' and email_dono = '$emailDono'");
                return $query->execute();
                die;

                
                //inserir a doação na tabela Doacao
                $array = array($emailDono,$emailReceptor, $dataDoacao, $codPet, $tipoDoacao);
                $inserirDoacao = $conexao->prepare("insert into doacao (email_dono, email_receptor, data_doacao,cod_pet, tipo_doacao) values (?,?,?,?,?)");
                $inserirDoacao->execute($array);
            }
        }else{
            return "Usuário não cadastrado";
        }
    }
?>
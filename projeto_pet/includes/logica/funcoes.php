<?php
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

    function tipoUsuario($conexao,$email){
        $array = array($email);
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

   // ------ FUNÇÕES PARA MEDICAMENTOS ------
    function inserirHistorico($conexao,$codPet, $nomeMedicamento, $dataHist, $pessoa, $observacoes){
        $array = array($dataHist, $observacoes,$pessoa,$codPet);
        $historico = $conexao->prepare("insert into historico (dt_historico, observacoes,flag_veterinario,cod_pet) values (?,?,?,?)");
        $query = $historico->execute($array);
        
        
        //aqui eu preciso de um jeito de pegar o cod do historico recém criado
        //add o campo hora na tabela historico, passar ele como argumento e usar isso pra buscar o codgigo do historico
        $histSelecionar = $conexao->();
        $codHist = $histSelecionar[0];
        echo $codHist;
        die;
        
        //selecionar o código do medicamento
        $nomeMed = $nomeMedicamento;
        $medicamento = buscarMedicamento($conexao,$nomeMed);
        $codMedicamento = $medicamento[0];
        //inserir codigo do medicamento e do historico na tabela medicamento_historico
        inserirMedHist($conexao,$codMedicamento, $codHist);

        return $query;
    }

    function inserirMedHist($conexao,$codMedicamento, $codHist){
        $array = array($medicamento, $codHist);
        $medHist = $conexao->prepare("insert into medicamento_historico (cod_medicamento, cod_historico) values (?,?)");
        $query = $medHist->execute($array);
        return $query;
    }

?>
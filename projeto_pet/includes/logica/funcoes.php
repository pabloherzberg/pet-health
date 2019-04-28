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

// ------ FUNÇÕES PARA PETS --------
    function listarPets($conexao, $email){
        $pets = array();
        $query = "select * from pet where email_dono ='$email'";
        $resultado = pg_query($conexao, $query);
        while($pet = pg_fetch_assoc($resultado)){
            array_push($pets, $pet);            
        }
        return $pets;
    }

    function inserirPet($conexao, $nome_pet, $dt_nascimento, $email_dono){
        $query = "insert into pet (nome_pet, dt_nascimento, email_dono) values ('$nome_pet', '$dt_nascimento', '$email_dono')";
        return pg_query($conexao, $query);
    }

    function removerPet($conexao, $codPet){
        $query = "delete from pet where cod_pet = '$codPet'";
        $resultado = pg_query($conexao, $query);
        return $resultado;
    }

    function atualizarPet($conexao, $codPet, $nomePet, $nasc){
        $query = "update pet set nome_pet = '{$nomePet}', dt_nascimento = '{$nasc}' where cod_pet = '{$codPet}'";
        $resultado = pg_query($conexao, $query);
        return $resultado;
    }

    function buscaPet($conexao, $email, $codPet){
        $pet = array();
        $query = "select * from pet where email_dono ='$email' and cod_pet= $codPet";
        $resultado = pg_query($conexao, $query);
        $pet = pg_fetch_array($resultado);
        return $pet;
    }

     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     function inserirMedicamento($conexao, $nomeMedicamento, $dt_validade){
        $query = "insert into medicamentos  (nome, validade) values ('$nomeMedicamento', '$dt_validade')";
        return pg_query($conexao, $query);
    }
     
?>
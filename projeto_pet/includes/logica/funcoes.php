<?php
    function inserirUsuario($conexao, $array){
        if(count($array)==6){
            $query = "insert into usuario(nome, email, senha, endereco, telefone, crmv) values ('$array[0]', '$array[1]', '$array[2]', '$array[3]', '$array[4]', '$array[5]')";
        }
        else{
            $query = "insert into usuario(nome, email, senha, endereco, telefone) values ('$array[0]', '$array[1]', '$array[2]', '$array[3]', '$array[4]')";
        }
        return pg_query($conexao,$query);
        /*Se o array possuir 6 posições é pq inclui o CRMV, logo o usuário é um VETERINÁRIO*/
    }

    function buscarUsuario($conexao, $email, $senha){
        $query = "select * from usuario where email ='$email' and senha = '$senha'";
        $dado_tabular = pg_query($conexao, $query);
        $array_dados = pg_fetch_array($dado_tabular);
        return $array_dados;
    }

    function alterarUsuario($conexao, $usuario){
        $query = "update usuario set nome = '{$usuario['nome']}', endereco = '{$usuario['endereco']}', telefone = '{$usuario['telefone']}' where email = '{$usuario['email']}'";
        return pg_query($conexao, $query);
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

     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     function inserirMedicamento($conexao, $nomeMedicamento, $dt_validade){
        $query = "insert into medicamentos  (nome, validade) values ('$nomeMedicamento', '$dt_validade')";
        return pg_query($conexao, $query);
    }
     
?>
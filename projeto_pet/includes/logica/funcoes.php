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
        $array = array($email);
        $dados_pets = $conexao->prepare("SELECT * FROM pet WHERE email_dono = ?");      
        $dados_pets->execute($array);
        $query = $dados_pets->fetchAll();
        return $query;
    }
    function inserirPet($conexao, $array){
        $pet = $conexao->prepare("insert into pet (nome_pet, dt_nascimento, email_dono) values (?,?,?)");
        $query = $pet->execute($array);
        return $query;
    }

    function removerPet($conexao, $codPet){
        $deletar = $conexao->prepare("delete from pet where cod_pet = '$codPet'");
        $query = $deletar->execute();
        return $query;
    }

    function atualizarPet($conexao, $array){
        $usuarios = $conexao->prepare("update pet set nome_pet = ?, dt_nascimento = ? where cod_pet = ?");
        $query = $usuarios->execute($array);
        return $query;
    }

    function buscaPet($conexao, $email, $codPet){
        $array = array($email, $codPet);
        $pet = $conexao->prepare("select * from pet where email_dono = ? and cod_pet= ?");
        $query = $pet->execute($array);
        $pets = $query->fetch(); //coloca os dados num array $usuario
        return $pets;
    }

     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     function inserirMedicamento($conexao, $nomeMedicamento, $dt_validade){
        $array = array($nomeMedicamento, $dt_validade);
        $medicamento = $conexao->prepare("insert into pet (nome_pet, dt_nascimento, email_dono) values (?,?,?)");
        $query = $medicamento->execute($array);
        return $query;
    }
     
?>
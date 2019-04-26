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
    
    function inserirPet($conexao, $nome_pet, $dt_nascimento, $email_dono){
        $query = "insert into pet (nome_pet, dt_nascimento, email_dono) values ('$nome_pet', '$dt_nascimento', '$email_dono')";
        return pg_query($conexao, $query);
    }

     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     
?>
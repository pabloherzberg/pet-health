<?php
    function inserirUsuario($array){
        if(count($array)==6){
            $stmt = $pdo->prepare("insert into usuario(nome, email, senha, endereco, telefone, crmv) values (?, ?, ?, ?, ?, ?)");
            $query = $stmt->execute($array);
        }
        else{
            $stmt = $pdo->prepare("insert into usuario(nome, email, senha, endereco, telefone) values (?, ?, ?, ?, ?)");
            $query = $stmt->execute($array);
        }
        return $query;
        /*Se o array possuir 6 posições é pq inclui o CRMV, logo o usuário é um VETERINÁRIO*/
    }

    function buscarUsuario($conexao, $email, $senha){
        $query = "select * from usuario where email ='$email' and senha = '$senha'";
        $dado_tabular = pg_query($conexao, $query);
        $array_dados = pg_fetch_array($dado_tabular);
        return $array_dados;
    }
    
    function inserirPet($conexao, $nome_pet, $dt_nascimento, $email_dono){
        $query = "insert into pet (nome_pet, dt_nascimento, email_dono) values ('$nome_pet', '$dt_nascimento', '$email_dono')";
        return pg_query($conexao, $query);
    }

     // ------ FUNÇÕES PARA MEDICAMENTOS ------

     
?>
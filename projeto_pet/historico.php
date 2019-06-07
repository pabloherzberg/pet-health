<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
include_once('includes/logica/funcoes.php');
?>
  <link rel="stylesheet" href="assets/css/historico.css">
  <script src="assets/js/historico.js">

  </script>
    <title>Histórico</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
<main>
<?php
    $emailSession = $_SESSION['email'];
    // teste para quem está medicando: veterinário ou dono do animal 
    if(isset($_POST['email_dono'])){
        if($_POST['email_dono'] == $emailSession){
            $email = $emailSession;
        }
        else{
            $email = $_POST['email_dono'];
        }
    }else{
        $email = $emailSession;
    }

    $codPet = $_POST['cod_pet'];
    $pet = buscaPet($conexao, $email, $codPet);

    $idade = idadePet($pet['dt_nascimento']);
    $ultimaConsulta = buscarHistoricoRecente($conexao,$codPet);
    $ultima = $ultimaConsulta[0];
    
    //buscar tipo de usuário que está medicando o pet
    $emailMedica = $emailSession; 
    
    $tipoUsuario = tipoUsuario($conexao,$emailMedica);
    $tipo = $tipoUsuario['crmv'];
    if($tipoUsuario['crmv'] !== NULL){
        $tipo = 1;
    }else{
        $tipo = 0;
    }
   ?>
<script>
let tipo = "<?php echo $tipo; ?>";
let codPet = "<?php echo $codPet; ?>"
</script>
<div>
     <p>Nome: <?php echo $pet['nome_pet']; ?></p>
     <p>Raça: <?php echo $pet['raca']; ?></p>
     <p>Idade: <?php echo $idade; ?>anos</p>
     <p>Última consulta: <?php echo $ultima; ?></p>
         
</div>
    <div id='tabela'>
        <table>
        <h1>Medicamentos</h1>
        <tr>
        <th>Nome</th>
        <th>Data aplicação</th>
        <th>Responsável</th>
        <th>Reforço</th>
        </tr>
        <?php 
        //PABLO fiz tudo em table pra melhor vizualizar os itens puxados no arrays, mas se tu achar melhor tirar, blz hahahha
        $medicamentos = buscarHistorico($conexao, $codPet);
        foreach($medicamentos as $medicamento):
        ?>
        <tr>
        <td><?php echo $medicamento['nome']; ?></td>
        <td><?php echo $medicamento['dt_historico']; ?></td>
        <td><?php 
            if($medicamento['flag_veterinario'] === true){
                echo "V";
            }
            else{
                echo "D";
            }; ?></td>
        <td><?php echo $medicamento['observacoes']; ?></td>
        </tr>
        </table>
        <?php endforeach; ?>
    </div>
    <button id='botaoHist' class="btn cadastro" onclick='criarFormHist()'>Adicionar Medicamento</button>
    <div id="formulario">
    </div> 
    <button id='botaoTrans' class="btn cadastro" onclick='criarFormTrans()'>Transferir Pet</button>
    <div id="formTransferencia">
    
    </div>
            
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
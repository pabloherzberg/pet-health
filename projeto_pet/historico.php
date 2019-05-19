<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/conecta.php');
include_once('includes/logica/funcoes.php');
?>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="assets/js/historico.js">

  </script>
    <title>Histórico</title>
</head>
<body>
<?php
    include_once("includes/componentes/header.php");
?>
<main>
<nav>
<a href="home.php">Home</a>
</nav>
<?php
    $email = $_SESSION['email'];
    $codPet = $_POST['cod_pet'];
    $pet = buscaPet($conexao, $email, $codPet);
    $idade = idadePet($pet['dt_nascimento']);
    $ultimaConsulta = buscarHistoricoRecente($conexao,$codPet);
    $ultima = $ultimaConsulta[0];
    
    //buscar usuário 
    $tipoUsuario = tipoUsuario($conexao,$email);
    $tipo = $tipoUsuario['crmv'];
    if($tipoUsuario['crmv'] !== NULL){
        $tipo = true;
    }else{
        $tipo = 0;
    }
   ?>
<script>
var tipo = "<?php echo $tipo; ?>";
var codPet = "<?php echo $codPet; ?>"
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
        <td><?php echo $medicamento['flag_veterinario']; ?></td>
        <td><?php echo $medicamento['observacoes']; ?></td>
        </tr>
        </table>
        <?php endforeach; ?>
    </div>
    <button id='botao' class="btn cadastro" onclick='criarFormHist()'>Adicionar Medicamento</button>
    <div id="formulario">
    </div> 

            
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
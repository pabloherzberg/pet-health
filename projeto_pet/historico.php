<?php
    include_once('includes/componentes/cabecalho.php');
    include_once("includes/componentes/header.php");  
    if(isset($_SESSION['crmv'])){
        $flagVet = true;
    }
    else{
        $flagVet = false;
    }
    $email = $_SESSION['email'];
    $codPet = $_POST['cod_pet'];
    $pet = buscaPet($conexao, $email, $codPet);
    $idade = idadePet($pet['dt_nascimento']);
    $ultimaConsulta = buscarHistoricoRecente($conexao,$codPet);
    $ultima = $ultimaConsulta[0];
?>
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/historico.js"></script>
    <title>Histórico</title>
</head>
<body>
    <main>
        <section>
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
                    <?php endforeach; ?>
                    </table>
                </div>
                <button id='botaoHist' class="btn cadastro" onclick='criarFormHist()'>Adicionar Medicamento</button>
                <form id='registrarHistorico' action="includes/logica/logica.php" method="post">
                    <input type="hidden" name="cod_pet" value='<?php echo $codPet ?>'>
                    <input type="hidden" name="flag_veterinario" value='<?php echo $flagVet ?>'>
                </form> 
                <button id='botaoTrans' class="btn cadastro" onclick='criarFormTrans()'>Transferir Pet</button>
                <form id='transferirPet' action="includes/logica/logica.php" method="post">
                    <input type="hidden" name="cod_pet" value='<?php echo $codPet ?>'>
                </form>
        </section>
    </main>
<?php require('includes/componentes/footer.php');?>
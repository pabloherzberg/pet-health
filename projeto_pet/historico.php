<?php
    include_once('includes/componentes/cabecalho.php');
    $codPet = $_POST['cod_pet'];
    $email = $_SESSION['email'];
    $pet = buscaPet($conexao, $email, $codPet);
    $idade = idadePet($pet['dt_nascimento']);
    $ultimaConsulta = buscarHistoricoRecente($conexao,$codPet);
    $ultima = $ultimaConsulta[0];
?>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/historico.css">
    <script src="assets/js/historico.js"></script>
    <script>
        window.onload = ()=>{
            const lista = document.querySelector('#listaMenu');
            const li = document.createElement('li');
            const li2 = document.createElement('li');
            const button1 = document.createElement('button');
            const button2 = document.createElement('button');
            button1.id = 'botaoHist';
            button1.setAttribute("onclick","criarFormHist();");
            button1.innerText = 'Adicionar Medicamento';
            button2.id = 'botaoTrans';
            button2.setAttribute("onclick","criarFormTrans();");
            button2.innerText = 'Transferir Pet';
            lista.prepend(li,li2);
            li.append(button1);
            li2.append(button2);
        }
    </script>
    <title>Histórico</title>
</head>
<body>
    <?php     include_once("includes/componentes/header.php");  ?>
    <main>
        <section>
            <div id='idPet'>
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
                <form id='registrarHistorico' action="includes/logica/logica.php" method="post">
                    <input type="hidden" name="cod_pet" value='<?php echo $codPet ?>'>
                </form> 
                <form id='transferirPet' action="includes/logica/logica.php" method="post">
                    <input type="hidden" name="cod_pet" value="<?php echo $codPet ?>">
                </form>
        </section>
    </main>
<?php require('includes/componentes/footer.php');?>
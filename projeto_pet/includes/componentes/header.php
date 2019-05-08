<header>
    <nav id='menu'>
        <div id='botaoMenu' onclick='expandir()'></div>
        <ul id='listaMenu'>
            <li><a href="addPet.php">Adicionar Pet</a></li>
            <li><a href="addPet.php">Pets</a></li>
            <li><a href="historico.php">Históricos</a></li>
            <li><a href="alterarUsuario.php">Alterar cadastro</a></li>
            <li><a href="calendario.php">Checar calendário</a></li>
            <li><a href="inserirMedicamento.php">Add medicamento</a></li>
            <li>
                <button>
                    <form action="includes/logica/logica.php" method="post">
                        <input type="submit" name="deslogar" value="Deslogar">
                    </form>
                </button>
            </li>
            <li>
                <button>
                    <a href="alterarCadastro.php">Alterar Cadastro</a>
                </button>
            </li>
        </ul>
    </nav>
    <figure>
        <img id="logo" src="assets/img/pet.png" alt="logo da empresa">
    </figure>
    <h1>Pet&Health</h1>
    <h5>Cuidando da saúde do seu pet</h5>        
</header>
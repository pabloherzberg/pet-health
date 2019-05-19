function criarFormPet(){
    const div = document.getElementById('formulario');
    const botao = document.getElementById('botao');
    const form = document.createElement('FORM');
    const nome = document.createElement('INPUT');
    const raca = document.createElement('INPUT');
    const data = document.createElement('INPUT');
    const submit= document.createElement('INPUT');
    form.action="includes/logica/logica.php";
    form.method="post";
    nome.type='text';
    nome.placeholder='nome';
    nome.name='nome';
    raca.type='text';
    raca.placeholder='raça';
    raca.name='raca';
    data.type='date';
    data.name='dt_nascimento';
    submit.type='submit';
    submit.name='inserirPet';
    submit.value='enviar';
  
    div.appendChild(form).append(nome,raca, data, submit);
    botao.className='hide';
  
  }

  function criarFormTransferencia(){
    const div = document.getElementById("trans");
    const botao = document.getElementById("botaoTrans");
    const formulario = document.createElement("FORM");
    const email = document.createElement("INPUT");
    const select = document.createElement("SELECT");
    const op1 = document.createElement("option");
    const op2 = document.createElement("option");
    //falta os dados do pet pra passar hidden
    const submit = document.createElement("SUBMIT");

    formulario.method = 'post';
    formulario.action = 'includes/logica/logica.php';

    email.name = 'email';
    email.placeholder = 'email adotante/cuidador';
    email.value = 'email'//pegar o email do adotante/cuidador

    select.text = 'Tipo de doação';
    

    op1.name = 'doacao';
    op1.text = 'Permanente';
    op1.value = 'p';

    op2.name = 'temporaria';
    op2.text = 'Temporária';
    op2.value = 't';

    div.appendChild(form).append(email,op1,op2, submit);
    botao.className='hide';

  }
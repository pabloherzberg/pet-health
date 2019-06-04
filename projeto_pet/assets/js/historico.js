
function criarFormHist(){
    
    const div = document.getElementById('formulario');
    const botao = document.getElementById('botaoHist');
    const form = document.createElement('FORM');
    const nomeMedicamento = document.createElement('INPUT');
    const pessoa = document.createElement('INPUT');
    const pet = document.createElement('INPUT');
    const data = document.createElement('INPUT');
    const hora = document.createElement('INPUT');
    const observacao = document.createElement('TEXTAREA');
    const submit = document.createElement('INPUT');

    form.action="includes/logica/logica.php";
    form.method="post";

    nomeMedicamento.type='text';
    nomeMedicamento.placeholder='nome do medicamento';
    nomeMedicamento.name='nome';
    
    pessoa.type='hidden';
    pessoa.name='flag_veterinario';
    pessoa.value = tipo;
    
    pet.type='hidden';
    pet.name='cod_pet';
    pet.value= codPet;
    
    data.type='date';
    data.name='dt_historico';

    hora.type='hidden';
    hora.name='hora';
    hora.value= new Date();
    
    observacao.placeholder='Observações';
    observacao.name='observacoes';
    observacao.type='text';

    submit.type='submit';
    submit.name='inserirHistorico';
    submit.value='Enviar';
  
    div.appendChild(form).append(nomeMedicamento,pessoa,pet, data,hora,observacao,submit);
    botao.className='hide';
  
  }

  function criarFormTrans(){
    const div = document.getElementById('formTransferencia');
    const botao = document.getElementById('botaoTrans');
    const form = document.createElement('FORM');
    const pet = document.createElement('INPUT');
    const data = document.createElement('INPUT');
    const emailReceptor = document.createElement('INPUT');
    const tipoDoacao = document.createElement('select');
    const submit = document.createElement('INPUT');

    form.action="includes/logica/logica.php";
    form.method="post";

    tipoDoacao.name = 'tipoDoacao';
    tipoDoacao.options[0] = new Option('Permanente', 'P');
    tipoDoacao.options[1] = new Option('Temporária', 'T');

    //nome ------------> inserir no banco tb 
    //telefone

    emailReceptor.type = 'text';
    emailReceptor.name = 'email_receptor';
    emailReceptor.placeholder = 'email do receptor';
    
    data.type='hidden';
    data.name='data_doacao';
    data.value= new Date();
    
    pet.type='hidden';
    pet.name='cod_pet';
    pet.value= codPet;

    submit.type='submit';
    submit.name='transferirHistorico';
    submit.value='Transferir';
  
    div.appendChild(form).append(emailReceptor,pet,tipoDoacao, data,submit);
    botao.className='hide';

  }
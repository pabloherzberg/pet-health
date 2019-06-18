
function criarFormHist(){
    const form = document.getElementById('registrarHistorico');
    const nomeMedicamento = document.createElement('INPUT');
    const data = document.createElement('INPUT');
    const hora = document.createElement('INPUT');
    const observacao = document.createElement('TEXTAREA');
    const submit = document.createElement('INPUT');
    const buttons = document.querySelectorAll('button');

    nomeMedicamento.type='text';
    nomeMedicamento.placeholder='nome do medicamento';
    nomeMedicamento.name='nome';
    
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
  
    buttons[0].parentNode.removeChild(buttons[0]);
    buttons[1].parentNode.removeChild(buttons[1]);
    form.append(nomeMedicamento,data,hora,observacao,submit);
  }

function criarFormTrans(){
    const form = document.getElementById('transferirPet');
    const inicioCuidados = document.createElement('INPUT');
    const fimCuidados = document.createElement('INPUT');
    const emailReceptor = document.createElement('INPUT');
    const tipoDoacao = document.createElement('select');
    const submit = document.createElement('INPUT');
    const buttons = document.querySelectorAll('button');
    const idPet = document.getElementById('idPet');
    const tabela = document.getElementById('tabela');

    idPet.parentNode.removeChild(idPet);
    tabela.parentNode.removeChild(tabela);

    tipoDoacao.name = 'tipoDoacao';
    tipoDoacao.options[0] = new Option('Permanente', 'P');
    tipoDoacao.options[1] = new Option('Temporária', 'T');
    tipoDoacao.onchange = event => {
      if(event.target.value == 'P'){
        form.append(emailReceptor, inicioCuidados, submit);
        form.removeChild(fimCuidados);
      }
      else{
        form.append(emailReceptor, inicioCuidados, fimCuidados, submit);
      }
    }
    form.append(tipoDoacao);

    emailReceptor.type = 'text';
    emailReceptor.name = 'email_receptor';
    emailReceptor.placeholder = 'email do receptor';
    
    inicioCuidados.type='date';
    inicioCuidados.name='data_doacao';
    
    fimCuidados.type='date';
    fimCuidados.name='data_devolucao';

    submit.type='submit';
    submit.name='transferirHistorico';
    submit.value='Transferir';


}

function criarFormHist(){
    const div = document.getElementById('formulario');
    const botao = document.getElementById('botao');
    const form = document.createElement('FORM');
    const nome = document.createElement('INPUT');
    const pessoa = document.createElement('INPUT');
    const data = document.createElement('INPUT');
    const observacao = document.createElement('TEXTAREA');
    const submit = document.createElement('INPUT');

    form.action="includes/logica/logica.php";
    form.method="post";
    nome.type='text';
    nome.placeholder='nome do medicamento';
    nome.name='nome';
    pessoa.type='text';
    pessoa.name='flag_veterinario';
    data.type='date';
    data.name='dt_historico';
    submit.type='submit';
    submit.name='inserirHistorico';
    submit.value='Enviar';
  
    div.appendChild(form).append(nome,pessoa, data, submit);
    botao.className='hide';
  
  }
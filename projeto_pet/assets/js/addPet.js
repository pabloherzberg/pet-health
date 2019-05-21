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

  
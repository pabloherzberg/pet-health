function logar(){
    const logar = document.getElementById('logar');
    const cadastrar = document.getElementById('cadastrar');
    const div = document.getElementById('formulario');
    const formulario = document.createElement('FORM');
    const email = document.createElement('INPUT');
    const senha = document.createElement('INPUT');
    const submit = document.createElement('INPUT');

    email.placeholder='email';
    email.name='email';
    email.type='text';
    senha.placeholder='senha';
    senha.name='senha';
    senha.type='text';
    submit.value='logar';
    submit.name='logar';
    submit.type='submit';

    formulario.method='post';
    formulario.action='includes/logica/logica.php';
    logar.parentNode.removeChild(logar);
    cadastrar.parentNode.removeChild(cadastrar);
    div.appendChild(formulario).append(email,senha,submit);
}

function cadastrar(){
    const logar = document.getElementById('logar');
    const cadastrar = document.getElementById('cadastrar');

    const dono = document.createElement('BUTTON');
    const vet = document.createElement('BUTTON');
    const div = document.getElementById('formulario');

    dono.innerText='Dono';
    vet.innerText='Veterinário';
    
    logar.parentNode.removeChild(logar);
    cadastrar.parentNode.removeChild(cadastrar);

    div.append(dono,vet);

    dono.addEventListener('click',formDono);
    vet.addEventListener('click',formVet);

    function formDono(){
        div.removeChild(dono);
        div.removeChild(vet);
        const formulario = document.createElement('FORM');
        const nome = document.createElement('INPUT');
        const email = document.createElement('INPUT');
        const senha = document.createElement('INPUT');
        const endereco = document.createElement('INPUT');
        const telefone = document.createElement('INPUT');
        const submit = document.createElement('INPUT');

        nome.name='nome';
        nome.placeholder='nome';
        nome.type='text';
        email.name='email';
        email.placeholder='email';
        email.type='text';
        senha.name='senha';
        senha.placeholder='senha';
        senha.type='text';
        endereco.name='endereco';
        endereco.placeholder='endereco';
        endereco.type='text';
        telefone.name='telefone';
        telefone.placeholder='telefone';
        telefone.type='text';
        submit.name='cadastrar';
        submit.value='cadastrar';
        submit.type='submit';
        formulario.method='post';
        formulario.action='includes/logica/logica.php';

        div.appendChild(formulario).append(nome,email,senha,endereco,telefone,submit);
    }
    function formVet(){
        div.removeChild(dono);
        div.removeChild(vet);
        const formulario = document.createElement('FORM');
        const nome = document.createElement('INPUT');
        const email = document.createElement('INPUT');
        const senha = document.createElement('INPUT');
        const endereco = document.createElement('INPUT');
        const telefone = document.createElement('INPUT');
        const crmv = document.createElement('INPUT');
        const submit = document.createElement('INPUT');

        nome.name='nome';
        nome.placeholder='nome';
        nome.type='text';
        email.name='email';
        email.placeholder='email';
        email.type='text';
        senha.name='senha';
        senha.placeholder='senha';
        senha.type='text';
        endereco.name='endereco';
        endereco.placeholder='endereco';
        endereco.type='text';
        telefone.name='telefone';
        telefone.placeholder='telefone';
        telefone.type='text';
        crmv.name='crmv';
        crmv.placeholder='crmv';
        crmv.type='text';
        submit.name='cadastrar';
        submit.value='cadastrar';
        submit.type='submit';
        formulario.method='post';
        formulario.action='includes/logica/logica.php';

        div.appendChild(formulario).append(nome,email,senha,endereco,telefone,crmv,submit);
    }
}

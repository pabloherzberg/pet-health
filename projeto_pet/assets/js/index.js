function logar(){
    const logar = document.getElementById('logar');
    const cadastrar = document.getElementById('cadastrar');
    const div = document.getElementById('formulario');
    const formulario = document.createElement('FORM');
    const email = document.createElement('INPUT');
    const senha = document.createElement('INPUT');
    const submit = document.createElement('INPUT');
    const section = document.getElementsByClassName('texto');

    section[1].style.display='none';
    section[0].style.display='none';
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
    const footer = document.getElementById('footer');
    const root = document.documentElement;
    const body = document.body;
    const section = document.getElementsByClassName('texto');
    dono.innerText='Dono';
    vet.innerText='Veterinário';
    logar.parentNode.removeChild(logar);
    cadastrar.parentNode.removeChild(cadastrar);
    section[0].style.display ='none';
    section[1].style.display='none';
    div.append(dono,vet);
    root.style.setProperty('--principal', '#78acec');
    root.style.setProperty('--background', '#e1e1e1');
    body.style.backgroundImage ='url(null)';
    footer.style.backgroundImage = "url(/pet-health/projeto_pet/assets/img/cadastro_selecionar.png)"
    footer.style.backgroundPosition = "48% 137%";
    dono.addEventListener('click',formDono);
    dono.addEventListener('click',validar);
    vet.addEventListener('click',formVet);
    vet.addEventListener('click',validar);

    function formDono(){
        const formulario = document.createElement('FORM');
        const nome = document.createElement('INPUT');
        const email = document.createElement('INPUT');
        const senha = document.createElement('INPUT');
        const endereco = document.createElement('INPUT');
        const telefone = document.createElement('INPUT');
        const submit = document.createElement('INPUT');

        div.removeChild(dono);
        div.removeChild(vet);
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
        footer.style.backgroundImage = "url(/pet-health/projeto_pet/assets/img/cadastro.png)";
        footer.style.backgroundPosition = "50% 58%";
        footer.style.backgroundSize='150%';
        root.style.setProperty('--background', '#d5f0f1');
        root.style.setProperty('--principal','#6ebcbf');
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
        const inicioExp = document.createElement('input');
        const fimExp = document.createElement('input');

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
        inicioExp.name='inicio_expediente';
        inicioExp.placeholder='inicio do expediente HH:MM';
        fimExp.name='fim_expediente';
        fimExp.placeholder='fim do expediente HH:MM';
        formulario.method='post';
        formulario.action='includes/logica/logica.php';
        div.appendChild(formulario).append(nome,email,senha,endereco,telefone,crmv,inicioExp, fimExp,submit);
        footer.style.backgroundImage = "url(/pet-health/projeto_pet/assets/img/cadastro_vet.png)";
        footer.style.backgroundPosition = "50% 85%";
        root.style.setProperty('--background', '#cdf9dc');
        root.style.setProperty('--principal','#6ebf89');
    }
}

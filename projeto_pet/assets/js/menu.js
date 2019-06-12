$.ajax({
    type: "post",
    url: "includes/logica/testeAJAXlogado.php",
    dataType: "html",
    success: function (flag) {
        if(flag == false){
            esconderMenu();
        }
    }
});

$.ajax({
    type: "post",
    url: "includes/logica/testeAJAXtipoUsuario.php",
    dataType: "html",
    success: function (veterinario) {
        if(veterinario == false){
            donoMenu();
        }
        else{
            vetMenu();
        }
    }
});

function esconderMenu(){
    const menu = document.getElementById('menu');
    menu.style.display='none';
}
function vetMenu(){
    const menu = document.getElementById('menu');
    const list = menu.querySelectorAll('li');
    list[0].style.display='none';
    list[1].style.display='none';
}
function donoMenu(){
    const menu = document.getElementById('menu');
    const list = menu.querySelectorAll('li');
    list[2].style.display='none';
    list[4].style.display='none';
}
function alterarMenu(){
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
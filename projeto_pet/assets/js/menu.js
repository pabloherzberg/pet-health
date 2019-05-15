function inicializaAjax() {
    var ajax;
    if (window.XMLHttpRequest) {
        ajax= new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");
        if (!ajax) {
            ajax=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }  else {
        alert ("Seu navegador não suporta esta aplicação");
    }
    return ajax;
}
function requisitar(){
    var requisicaoAjax = inicializaAjax();
    if (requisicaoAjax) {
        requisicaoAjax.onreadystatechange = function() {
            if (requisicaoAjax.readyState == 4) {
                if (requisicaoAjax.status==200) {
                    if (requisicaoAjax.responseText) {
                        ////codigo a partir daqui////
                            let flag = requisicaoAjax.responseText;
                            if(flag==1)
                            {
                                esconderMenu();
                            }
                        ////aqui acaba teu código///
                    }
                }
                else {
                    alert("Problema na Comunicação");
                }
            }
        }
    }
requisicaoAjax.open("GET", "includes/logica/testeAJAXconteudo.php");
requisicaoAjax.send(null);
}
window.onload = requisitar;
///fim ajax////



function esconderMenu(){
    const menu = document.getElementById('menu');
    menu.style.display='none';
}

function expandir(){
    const botao = document.getElementById('botaoMenu');
    const ul = document.getElementById('listaMenu');
    botao.classList.toggle('div_clicou');
    ul.classList.toggle('ul_clicou');
}
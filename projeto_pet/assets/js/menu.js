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
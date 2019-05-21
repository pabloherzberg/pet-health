function esconderMenu(){
    const menu = document.getElementById('menu');
    menu.style.display='none';
}

$.ajax({
    type: "post",
    url: "includes/logica/testeAJAXconteudo.php",
    dataType: "html",
    success: function (flag) {
        if(flag == false){
            esconderMenu();
        }
    }
});

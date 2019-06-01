function validar(){
    const form = document.querySelector('form');
    console.log(form);
    for (let campo of form){
      campo.addEventListener("focusin", focus);
      campo.addEventListener("focusout", out);
    }
    
    function focus(event) {
        const input = event.currentTarget;
        if(input.value==''){
            input.style.backgroundColor = "";
        }
    }
    
    function out(event) {
        const input = event.currentTarget;
        if(input.value==''){
            input.style.backgroundColor = "red";
            
        }
    }
}

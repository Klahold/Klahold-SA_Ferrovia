document.addEventListener("DOMContentLoaded", function(){
    const formulario = document.getElementById("Formularios");

    formulario.addEventListener("submit", function(e){
    e.preventDefault();
    let valido = true; 

    document.getElementById("erroEmail").textContent = " ";
    document.getElementById("erroSenha").textContent = " ";

    const emailcodigo = document.getElementById("Codigo_maquinista").value.trim();
    const senha = document.getElementById("senha_maquinista").value.trim();
    
    if (senha.length < 6){
        document.getElementById("erroSenha").textContent = "Senha";
        valido = false;
    }
    function validadorEmailCodigo(){

        let validocodigo = true
        let validoemail = true
        let validoconjunto = true

        const codigoRegex = /^[a-zA-Z0-9]{6}$/;

         if (!codigoRegex.test(emailcodigo) ){
        validocodigo = false;}

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(emailcodigo) ){
        validoemail = false;}

        if (validocodigo == false && validoemail == false){
            validoconjunto = false
        }

        if (!validoconjunto){
            document.getElementById("erroEmail").textContent = "E-mail ou codigo Inválido";
            valido = false;
        }
    }

    validadorEmailCodigo();


    if(valido){
        window.location.href=("Menu.html");
    } 

    });
});
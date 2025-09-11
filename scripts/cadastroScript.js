function validarFormulario() {
    const nome = document.getElementById('nome').value;

    const dataNascimento = document.getElementById('dataNascimento').value;

    const naturalidade = document.getElementById('naturalidade').value;

    const nacionalidade = document.getElementById('nacionalidade').value;

    const estadoCivil = document.getElementById('estadoCivil').value;

    const cargo = document.getElementById('cargo').value;

    const CPF = document.getElementById('CPF').value;

    const RG = document.getElementById('RG').value;

    const email = document.getElementById('email').value;

    const dataAdmissão = document.getElementById('dataAdmissão').value;

    const genero = document.getElementById('genero').value;

    if (!nome || !dataNascimento || !naturalidade || !estadoCivil || !cargo || !CPF || !RG || !email || !dataAdmissão || !genero) {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Por favor, insira um email válido.");
        return false;
    }

    const dataNascimentoRegex ="(?<=^|\D)\d{2}/\d{2}/\d{4}(?=\D|$)";
    if (!dataNascimentoRegex.test(dataNascimento)) {
        alert("Por favor, insira uma data de nascimento válida.");
        return false;
    }
    
    const regexEstadoCivil = "/^(solteiro|casado|divorciado|viúvo|união estável)$/i";
    if (!regexEstadoCivil.test(estadoCivil)) {
        alert("Por favor, insira um estado civil válido.");
        return false;
    }

    alert("Cadastro enviado com sucesso!");
}
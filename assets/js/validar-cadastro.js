$(function(){
    $("#form-cadastro").validate({
        rules : {
            nome : {
                required : true
            },
            login : {
                required : true
            },
            senha : {
                required : true,
                minlength : 6
            },
            confirmasenha : {
                required : true,
                minlength : 6,
                equalTo : "#senha"
            }
        },
        messages : {
            nome : {
                required : "Por favor, informe seu nome."
            },
            login : {
                required : "É necessário informar um login."
            },
            senha : {
                required : "Informe uma senha.",
                minlength : "A senha deve possuir pelo menos 6 caracteres."
            },
            confirmasenha : {
                required : "Confirme a senha.",
                minlength : "A senha deve possuir pelo menos 6 caracteres.",
                equalTo : "A confirmação deve ser igual à senha."
            }
        }
    });
});
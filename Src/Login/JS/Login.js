$(document).ready(function(){

    $("#formLogin").submit(function(e){
        var hashSenha = md5($("#password").val());
        var formData =  {
            action: 'Logar',
            login: $("#login").val(),
            senha: hashSenha
        };

        $.ajax({
            type: "POST",
            url: "/LoginController.php",
            dataType: 'json',
            data: formData,
            success: function (data){
                console.log(data);
                if(data == "LoginErrado")
                {
                    bootbox.alert("Usuario ou senha invalidos");
                    $("#login").val("");
                    $("#password").val("");
                }
                if(data.idUsuario > 0)
                {
                    console.log('logado');
                    $("#pageBody").load("/View/Menu.html");
                }
                return false;
            },
            error: function () {
            },
            complete: function (data) {
            }
        });
       return false;
    });

    $("#BtnCadastro").click(function (){
        $('#pageBody').load("/View/Cadastro.html");
    });

});
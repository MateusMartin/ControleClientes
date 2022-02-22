$(document).ready(function(){

    $("#FormCadastro").submit(function (){
       var login = $("#login").val();
       var senha = $("#password").val();
       var senhaConfirm = $("#passwordConf").val();

       var inserir = true;



       if(login.length < 3)
       {
           bootbox.alert("Login deve conter pelo menos 3 caracteres");
           inserir = false;
           return false;
       } else if(senha != senhaConfirm)
       {

           bootbox.alert("As senhas devem coincidir");
           inserir = false;
           return false;
       } else if(senha.length <3)
       {
           bootbox.alert("Senha deve conter pelo menos 3 caracteres");
           inserir = false;
           return false;
       }

       if(inserir == true)
       {
           var hashSenha = md5($("#password").val());

           var formData =
               {
                   action: 'criarUser',
                   login: $("#login").val(),
                   senha: hashSenha
               }

           $.ajax({
               type: "POST",
               url: "/CadastroController.php",
               dataType: 'json',
               data: formData,
               success: function (data){
                   if(data == 'UsuarioExistente')
                   {
                       bootbox.alert("Error: usuario já cadastrado");
                   }
                   else if(data == 'success')
                   {
                       bootbox.alert({
                           size: "small",
                           title: "Sucesso",
                           message: "Usuario criado com sucesso",
                           callback: function()
                           {
                               $("#pageBody").load('/View/Login.html')
                           }
                       })
                   }
                   else if(data == 'error')
                   {
                       bootbox.alert("Error: ocorreu um erro ao cadastrar usuario");
                   }


                   return false;
               },
           });

       }



        return false;
    });


});
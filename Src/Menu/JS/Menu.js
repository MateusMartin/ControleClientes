$(document).ready(function(){


    $("#btnDeslogar").click(function(){
        var formData =  {
            action: 'Deslogar',
        };

        $.ajax({
            type: "POST",
            url: "/LoginController.php",
            dataType: 'json',
            data: formData,
            success: function (data){
                if(data == "Success")
                {
                    document.location.reload(true);
                }else if(data=="error")
                {
                    bootbox.alert("ERROR ao deslogar!");
                }
            },
            error: function () {
            },
            complete: function (data) {
            }
        });
    });


    carregaTabela();

    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $("#DDD").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });

    $("#Telefone").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });
    $("#CEP").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });

    $("#Numero").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });


    $("#BtnCadCliente").click(function (){
        var idClie = $("#idCliente").val();
        var insert = true;
        var cpf = $("#Cpf").val();

        if($("#Nome").val() == "")
        {
            bootbox.alert("Informe o nome do cliente");
            insert = false;
        }

        else if( cpf.length < 11)
        {
            bootbox.alert("Informe os onze digitos do CPF");
            insert = false;
        }

        else if( $("#Tipo").val() == "")
        {
            bootbox.alert("Informe o tipo");
            insert = false;
        }

        else if( $("#DtNasc").val() == "")
        {
            bootbox.alert("Informe a data de nascimento");
            insert = false;
        }

        if(insert == true)
        {
            if(idClie == "0")
            {
                var formData =  {
                    action: 'CriarUsuario',
                    Nome: $("#Nome").val(),
                    Cpf: $("#Cpf").val(),
                    Tipo: $("#Tipo").val(),
                    Dtnasc: $("#DtNasc").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/ClienteController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabela();

                            bootbox.dialog({
                                message: 'Cliente cadastrado com sucesso!',
                                title: "Cliente",
                                onEscape: function() {
                                    $("#modalCadCliente").modal('hide');
                                }
                            });

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao cadastrar cliente!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;
            }
            else
            {
                var formData =  {
                    action: 'EditarUsuario',
                    idClie: $("#idCliente").val(),
                    Nome: $("#Nome").val(),
                    Cpf: $("#Cpf").val(),
                    Tipo: $("#Tipo").val(),
                    Dtnasc: $("#DtNasc").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/ClienteController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabela();

                            bootbox.dialog({
                                message: 'Cliente editado com sucesso!',
                                title: "Cliente",
                                onEscape: function() {
                                    $("#modalCadCliente").modal('hide');
                                }
                            });

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao editado cliente!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;

            }
        }





    });

    $("#BtnCadTelefone").click(function (){
        if($("#FrmTelefone").is(':visible') == false)
        {
            $("#FrmTelefone").show();
            $("#BtnCadTelefone").text("Fechar");
            $("#DDD").val("");
            $("#Telefone").val("");
            $("#tleTipo").val("");
            $("#idTele").val("0");
            $("#BtnTelefone").text("Cadastrar");

        }
        else
        {
            $("#FrmTelefone").hide();
            $("#BtnCadTelefone").text("Cadastrar novo telefone");
        }
    });

    $("#BtnCadEndereco").click(function () {
        if($("#FrmEndereco").is(':visible') == false)
        {
            $("#FrmEndereco").show();
            $("#BtnCadEndereco").text("Fechar");
            $("#idEnd").val("0");
            $("#UF").val("");
            $("#CEP").val("");
            $("#Rua").val("");
            $("#Numero").val("");
            $("#Complemento").val("");
            $("#Bairro").val("");
            $("#EnderecoCol").val("");
            $("#BtnEndereco").text("Cadastrar");
        }
        else
        {
            $("#FrmEndereco").hide();
            $("#BtnCadEndereco").text("Cadastrar novo Endereço");
        }
    });

    $("#BtnTelefone").click(function(){
        var isertTel = true

        var ddd = $("#DDD").val();
        var numero = $("#Telefone").val();
        if(ddd.length < 2)
        {
            bootbox.alert('Informe os dois numeros do DDD')
            isertTel = false;
        } else if (numero.length < 8)
        {
            bootbox.alert("Telefone deve ter ao menos 8 caracteres");
            isertTel = false;
        } else if($("#tleTipo").val() == "")
        {
            bootbox.alert("Informe o tipo do telefone");
            isertTel = false;
        }

        if(isertTel == true)
        {
            var editaTle = $("#idTele").val();
            console.log(editaTle);
            if(editaTle == "0")
            {
                var formData =  {
                    action: 'CadastraTelefone',
                    idClie: $("#tleIdCLie").val(),
                    DDD: $("#DDD").val(),
                    Telefone: $("#Telefone").val(),
                    Tipo: $("#tleTipo").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/TelefoneController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabTelefone($("#tleIdCLie").val());
                            bootbox.alert("Telefone Cadastrado!");
                            $("#FrmTelefone").hide();
                            $("#BtnCadTelefone").text("Cadastrar novo telefone");

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao cadastrar telefone!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;

            }else
            {

                var formData =  {
                    action: 'EditaTelefone',
                    idTle: editaTle,
                    DDD: $("#DDD").val(),
                    Telefone: $("#Telefone").val(),
                    Tipo: $("#tleTipo").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/TelefoneController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabTelefone($("#tleIdCLie").val());
                            bootbox.alert("Telefone Editado!");
                            $("#FrmTelefone").hide();
                            $("#BtnCadTelefone").text("Cadastrar novo telefone");

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao cadastrar telefone!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;

            }
        }
    });


    $("#BtnEndereco").click(function ()
    {
        var cep = $("#CEP").val();
        var insert= true;
        var UF = $("#UF").val();
        var idEnd = $("#idEnd").val();

        if(cep.length < 8)
        {
            bootbox.alert("Informe os oito digitos do CEP");
            insert = false;
        } else if (UF.length < 2)
        {
            bootbox.alert("Informe os dois digitos do UF");
            insert = false;
        }else if ($("#Rua").val() == "")
        {
            bootbox.alert("Informe a rua");
            insert = false;
        }else if ($("#Numero").val() == "")
        {
            bootbox.alert("Informe o Numero");
            insert = false;
        }else if ($("#Complemento").val() == "")
        {
            bootbox.alert("Informe o Complemento");
            insert = false;
        }else if ($("#Bairro").val() == "")
        {
            bootbox.alert("Informe o Bairro");
            insert = false;
        }else if ($("#EnderecoCol").val() == "")
        {
            bootbox.alert("Informe o Endereço Col");
            insert = false;
        }

        if(insert == true)
        {
            if(idEnd == "0")
            {
                var formData =  {
                    action: 'CriarEndereco',
                    cep: cep,
                    UF: UF,
                    Rua: $("#Rua").val(),
                    Numero: $("#Numero").val(),
                    Complemento: $("#Complemento").val(),
                    Bairro: $("#Bairro").val(),
                    Enderecocol: $("#EnderecoCol").val(),
                    idClie: $("#endIdCLie").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/EnderecoController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            bootbox.alert("Endereço criado com sucesso!");
                            carregaEnderecos($("#endIdCLie").val());
                            $("#FrmEndereco").hide();
                            $("#BtnCadEndereco").text("Cadastrar novo Endereço");

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao cadastrar telefone!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;

            }
            else
            {
                var formData =  {
                    action: 'EditarEndereco',
                    idEndereco: $("#idEnd").val(),
                    cep: cep,
                    UF: UF,
                    Rua: $("#Rua").val(),
                    Numero: $("#Numero").val(),
                    Complemento: $("#Complemento").val(),
                    Bairro: $("#Bairro").val(),
                    Enderecocol: $("#EnderecoCol").val(),
                    idClie: $("#endIdCLie").val()
                };

                $.ajax({
                    type: "POST",
                    url: "/EnderecoController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            bootbox.alert("Endereço editado com sucesso!");
                            carregaEnderecos($("#endIdCLie").val());
                            $("#FrmEndereco").hide();
                            $("#BtnCadEndereco").text("Cadastrar novo Endereço");

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao cadastrar endereço!");
                        }
                        return false;
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
                return false;

            }



        }


    });



});

function deletar(id)
{
    bootbox.confirm({
        message: "Tem certeza que deseja deletar este cliente ?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result == true)
            {
                var formData =  {
                    action: 'DeletarCliente',
                    idCliente: id,
                };

                $.ajax({
                    type: "POST",
                    url: "/ClienteController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabela();
                            bootbox.dialog({
                                message: 'Cliente deletado com sucesso!',
                                title: "Cliente",
                                onEscape: function() {
                                }
                            });

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao deletar cliente!");
                        }
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
            }
        }
    });
}


function carregaTabela()
{
    $("#TableClieBody").empty();
    var formData =  {
        action: 'CarregaTabela',
    };
    $.ajax({
        type: "POST",
        url: "/ClienteController.php",
        dataType: 'json',
        data: formData,
        success: function (data){
            var html = "";
            for (var i = 0; i < data.length; i++)
            {
                var dataSplit = data[i]['Dtnasc'].split("-");
                var dataBr = dataSplit[2] + "/" + dataSplit[1] + "/" + dataSplit[0];

                html = html + "<tr>";
                html = html + "<td>" + data[i]['idCliente'] +"</td>";
                html = html + "<td>" + data[i]['Nome'] +"</td>";
                html = html + "<td>" + data[i]['Cpf'] +"</td>";
                html = html + "<td>" + data[i]['Tipo'] +"</td>";
                html = html + "<td>" + dataBr +"</td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-success w-100\" style=\"font-size: 15px; \" onclick=\"editar(" + data[i]['idCliente'] +','+ "\'" + data[i]['Nome'] + "\'" + ','+ "\'" + data[i]['Cpf'] + "\'" +','+ "\'" + data[i]['Tipo'] + "\'" +','+ "\'" + data[i]['Dtnasc'] + "\'" + ")\" value=\"Editar\" /> </td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-secondary w-100\" style=\"font-size: 15px; \" onclick=\"telefones(\'" + data[i]['idCliente']  +"\'"+ ',' +"\'" + data[i]['Nome'] + "\'" + ")\" value=\"Telefones\" /> </td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-secondary w-100\" style=\"font-size: 15px; \" onclick=\"enderecos(\'" + data[i]['idCliente'] +"\'"+ ',' +"\'" + data[i]['Nome'] + "\'" +  ")\" value=\"Endereços\" /> </td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-danger w-100\" style=\"font-size: 15px; \" onclick=\"deletar(" + data[i]['idCliente'] + ")\" value=\"Deletar\" /> </td>";
                html = html + "</tr>";
            }


            $("#TableClieBody").append(html);
            return false;
        },
        error: function () {
        },
        complete: function (data) {
        }
    });

}

function telefones(id,nome)
{
    $("#modalTelefone").modal("toggle")
    $("#tleIdCLie").val(id);
    $("#staticTelefoneBackdropLabel").text("Telefones de "+ nome)
    $("#FrmTelefone").hide();
    carregaTabTelefone(id);
}

function enderecos(id,nome)
{

    $("#modalEndereco").modal("toggle");
    $("#FrmEndereco").hide();
    $("#endIdCLie").val(id);
    $("#BtnCadEndereco").text("Cadastrar novo Endereço");
    $("#staticEnderecoBackdropLabel").text("Enderecos de " + nome);
    carregaEnderecos(id);
}

function carregaEnderecos(id)
{
    var formData =  {
        action: 'CarregaTabela',
        idClie: id
    };

    $.ajax({
        type: "POST",
        url: "/EnderecoController.php",
        dataType: 'json',
        data: formData,
        success: function (data){

            var html = "";
            for (var i = 0; i < data.length; i++)
            {
                html = html + "<tr>";
                html = html + "<td>" + data[i]['idEndereco'] +"</td>";
                html = html + "<td>" + data[i]['Cep'] +"</td>";
                html = html + "<td>" + data[i]['Logradouro'] + " " + data[i]['Numero'] +"</td>";
                html = html + "<td>" + data[i]['Complemento'] +"</td>";
                html = html + "<td>" + data[i]['Uf'] +"</td>";
                html = html + "<td>" + data[i]['Bairro'] +"</td>";
                html = html + "<td>" + data[i]['Enderecocol'] +"</td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-success w-100\" style=\"font-size: 15px; \" onclick=\"editarEndereco(" + data[i]['idEndereco'] +','+ "\'" + data[i]['Cep'] + "\'" + ','+ "\'" + data[i]['Logradouro'] + "\'" +','+ "\'" + data[i]['Numero'] + "\'"+ ','+ "\'" + data[i]['Complemento'] + "\'"+ ','+ "\'" + data[i]['Uf'] + "\'"+ ','+ "\'" + data[i]['Bairro'] + "\'"+ ','+ "\'" + data[i]['Enderecocol'] + "\'"+")\" value=\"Editar\" /> </td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-danger w-100\" style=\"font-size: 15px; \" onclick=\"deletarEndereco(\'" + data[i]['idEndereco'] +"\')\" value=\"Deletar\" /> </td>";
                html = html + "</tr>";
            }

            $("#TableEndBody").empty();
            $("#TableEndBody").append(html);
            return false;
        },
        error: function () {
        },
        complete: function (data) {
        }
    });


}

function deletarEndereco(id)
{
    bootbox.confirm({
        message: "Tem certeza que deseja deletar este endereço ?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result == true)
            {
                var formData =  {
                    action: 'DeletaEndereco',
                    idEndereco: id,
                };

                $.ajax({
                    type: "POST",
                    url: "/EnderecoController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaEnderecos($("#endIdCLie").val());
                            bootbox.dialog({
                                message: 'Telefone deletado com sucesso!',
                                title: "Cliente",
                                onEscape: function() {
                                }
                            });

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao deletar Telefone!");
                        }
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
            }
        }
    });
}

function editarEndereco(idEnd,Cep,logradouro,numero,complemento,uf,bairro,EnderecoCol)
{
    $("#idEnd").val(idEnd);
    $("#CEP").val(Cep);
    $("#UF").val(uf);
    $("#Rua").val(logradouro);
    $("#Numero").val(numero);
    $("#Complemento").val(complemento);
    $("#Bairro").val(bairro);
    $("#EnderecoCol").val(EnderecoCol);

    $("#BtnEndereco").text("Editar");
    $("#BtnCadEndereco").text("Fechar");
    $("#FrmEndereco").show();


}

function carregaTabTelefone(id)
{
    $("#TableTleBody").empty();

    var formData =  {
        action: 'CarregaTabela',
        idClie: id
    };

    $.ajax({
        type: "POST",
        url: "/TelefoneController.php",
        dataType: 'json',
        data: formData,
        success: function (data){
            console.log(data);

            var html = "";
            for (var i = 0; i < data.length; i++)
            {
                html = html + "<tr>";
                html = html + "<td>" + data[i]['idTelefone'] +"</td>";
                html = html + "<td>" + data[i]['DDD'] +"</td>";
                html = html + "<td>" + data[i]['Fone'] +"</td>";
                html = html + "<td>" + data[i]['Tipo'] +"</td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-success w-100\" style=\"font-size: 15px; \" onclick=\"editarTelefone(" + data[i]['idTelefone'] +','+ "\'" + data[i]['DDD'] + "\'" + ','+ "\'" + data[i]['Fone'] + "\'" +','+ "\'" + data[i]['Tipo'] + "\'"+ ")\" value=\"Editar\" /> </td>";
                html = html + "<td class=\"baronneue-bold-white-10px\"><input type=\"button\" class=\"btn btn-danger w-100\" style=\"font-size: 15px; \" onclick=\"deletarTelefones(\'" + data[i]['idTelefone'] +"\')\" value=\"Deletar\" /> </td>";
                html = html + "</tr>";
            }


            $("#TableTleBody").append(html);
            return false;
        },
        error: function () {
        },
        complete: function (data) {
        }
    });


}

function deletarTelefones(id)
{
    bootbox.confirm({
        message: "Tem certeza que deseja deletar este telefone ?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-success'
            },
            cancel: {
                label: 'Não',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result == true)
            {
                var formData =  {
                    action: 'DeletaTelefone',
                    idTelefone: id,
                };

                $.ajax({
                    type: "POST",
                    url: "/TelefoneController.php",
                    dataType: 'json',
                    data: formData,
                    success: function (data){
                        if(data == "Success")
                        {
                            carregaTabTelefone($("#tleIdCLie").val());
                            bootbox.dialog({
                                message: 'Telefone deletado com sucesso!',
                                title: "Cliente",
                                onEscape: function() {
                                }
                            });

                        }else if(data=="error")
                        {
                            bootbox.alert("ERROR ao deletar Telefone!");
                        }
                    },
                    error: function () {
                    },
                    complete: function (data) {
                    }
                });
            }
        }
    });
}

function editarTelefone(id,ddd,fone,tipo)
{
    $("#idTele").val(id);
    $("#DDD").val(ddd);
    $("#Telefone").val(fone);
    $("#tleTipo").val(tipo);
    $("#BtnCadTelefone").text("Fechar");
    $("#BtnTelefone").text("Editar");
    $("#FrmTelefone").show();
}

function editar(id,nome,cpf,tipo,data)
{
    $("#idCliente").val(id);
    $("#Nome").val(nome);
    $("#Cpf").val(cpf);
    $("#Tipo").val(tipo);
    $("#DtNasc").val(data);
    $("#BtnCadCliente").text("Editar Cliente");
    $("#modalCadCliente").modal('toggle');
    $("#staticBackdropLabel").text("Editar o Cliente");
}

function limpaData()
{
    $("#idCliente").val("0");
    $("#Nome").val("");
    $("#Cpf").val("");
    $("#Tipo").val("");
    $("#DtNasc").val("");
    $("#BtnCadCliente").text("Cadastrar Cliente");
    $("#staticBackdropLabel").text("Cadastrar um Cliente");
}

function fMasc(objeto,mascara) {
    obj=objeto
    masc=mascara
    setTimeout("fMascEx()",1)
}

function fMascEx() {
    obj.value=masc(obj.value)
}

function mCPF(cpf){
    cpf=cpf.replace(/\D/g,"")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return cpf
}




$(document).ready(function () {
    $('#btnHacerLogin').click(function () {
        var txtUsuario = $('#txtUsuario').val();
        var txtContrasena = $('#txtContrasena').val();
        var controlador = BASE_URL + 'app/controlador/ajax/accesoSistema.php';

        $.ajax({
            type: "POST",
            data: "txtUsuario=" + txtUsuario + "&txtContrasena=" + txtContrasena,
            url: controlador,
            dataType: "html",

            beforeSend: function () {
                $('#btnHacerLogin').empty();
                $('#btnHacerLogin').append('Validando ...');
//                $('#btnHacerLogin').append('<img src="' + GIF_CARGANDO_VERDE + '" style="margin-left:1em;" >');
            },
            success: function (data) {
                console.log(data);
                if (data === '1') {
                    setTimeout(function () {
                        $.toaster({priority: 'success', title: 'Autenticación', message: 'Ingreso satisfactorio'});
                        $('#btnHacerLogin').empty();
                        $('#btnHacerLogin').append('Ingresar');
                        location.href = 'inicio.php?q=inicio';
                    }, 2000);
                } else if (data === '0') {
                    setTimeout(function () {
                        $.toaster({priority: 'danger', title: 'Autenticación', message: 'Error, vuelva a intentar'});
                        $('#btnHacerLogin').empty();
                        $('#btnHacerLogin').append('Ingresar');
                    }, 2000);
                } else if (data === '2') {
                    setTimeout(function () {
                        $.toaster({priority: 'danger', title: 'Autenticación', message: 'Usuario o contrasena inválida'});
                        $('#btnHacerLogin').empty();
                        $('#btnHacerLogin').append('Ingresar');
                    }, 2000);
                } else if (data === '3') {
                    setTimeout(function () {
                        $.toaster({priority: 'warning', title: 'Autenticación', message: 'Usuario o contrasena vacía'});
                        $('#btnHacerLogin').empty();
                        $('#btnHacerLogin').append('Ingresar');
                    }, 2000);
                }

            },
            error: function () {
                console.log(controlador);
                console.log('Error de petición AJAX - Login');
            }
        });
    });
});
$(document).ready(function () {
    $('#datatable-predios').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron registros",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Información no disponible",
            "search": "Buscar:"
        },
        "searching": false,
        "ordering": true
    });
});

function soloNumeros(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function convertirMayusculas(e, elemento) {
    var tecla = (document.all) ? e.keyCode : e.which;
    elemento.value = elemento.value.toUpperCase();
}

function previsualizarImagen(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previsualizar').attr('src', e.target.result).css('width', '60%');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function validarCedula(identificacion_ingresada) {
    var cedula = identificacion_ingresada;
    array = cedula.split("");
    num = array.length;
    if (num === 10)
    {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++)
        {
            mult = 0;
            if ((i % 2) !== 0) {
                total = total + (array[i] * 1);
            } else
            {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final === 10 && digito === 0) || (final === digito)) {
            return 1; //Cédula correcta
        } else
        {
            return 0; //Cédula incorrecta
        }
    } else
    {
        return 2;
    }
}

function validarRuc(identificacion_ingresada) {
    var number = identificacion_ingresada;
    var dto = number.length;
    var valor;
    var acu = 0;
    if (number == "") {
        return 2; //RUC Inválido
    } else {
        for (var i = 0; i < dto; i++) {
            valor = number.substring(i, i + 1);
            if (valor == 0 || valor == 1 || valor == 2 || valor == 3 || valor == 4 || valor == 5 || valor == 6 || valor == 7 || valor == 8 || valor == 9) {
                acu = acu + 1;
            }
        }
        if (acu == dto) {
            while (number.substring(10, 13) != 001) {
                return 2; //RUC Inválido
            }
            while (number.substring(0, 2) > 24) {
                return 2; //RUC Inválido
            }
            return 1; // RUC Correcto

        } else {
            return 0;
        }
    }
}
var contador = 0;
$(document).ready(function(){
    $("#anadir").click(function(e){
        e.preventDefault(); // rechazamos cualquier redireccion
        contador++; // me permite incrementar el contador para saber en que fila estoy
        var productoExist = [];
        // $(".producto").each(function () {
        //     if ($(this).val() != "") {
        //         productoExist.push($(this).val());
        //     }
        // })
        $.get('?c=Venta&m=anadir', { contador }, function (data) {
            // la respuesta lelga dentro de data
            $("#contenido").append(data);
            // var options = "";
            // $(".producto[data-fila=" + contador + "]>option").each(function () {
            //     if ($.inArray($(this).val(), productoExist) == -1) {
            //         options += `<option value="${$(this).val()}">${$(this).html()}</option>`;
            //     }
            //     $(".producto[data-fila=" + contador + "]").html(options);
            // });
        });
    });

    $(document).on("change", '.producto', function () {
        var fila = $(this).attr('data-fila');
        var idProducto = $(this).val();

        $.get('?c=venta&m=obtenerPrecio', { idProducto }, function (data) {
            console.log(data);
            $(`.precio[data-fila=${fila}]`).val(data.precio);
            $(`.foto[data-fila=${fila}]`).attr('src', data.foto);
            $(`.stock[data-fila=${fila}]`).val(data.stock);
            $(`.cantidad[data-fila=${fila}]`).attr('max', data.stock);
        }, "json");

    })


    // Calcula la multiplicacion de los valores de los inputs
    $(document).on("change", ".precio,.cantidad", function () {
        //attr agarrar a cualquier atributo de lo que esta seleccionado
        var fila = $(this).attr('data-fila');

        var valorPrecio = $(`.precio[data-fila=${fila}]`).val();
        var valorCantidad = $(`.cantidad[data-fila=${fila}]`).val();

        valorPrecio = parseFloat(valorPrecio);
        valorCantidad = parseFloat(valorCantidad);
        var total = valorCantidad * valorPrecio;

        $(`.total[data-fila=${fila}]`).val(total.toFixed(2));

        // Calcular la suma totalGeneral

        var totalGeneral = 0;
        $(".total").each(function () {
            var valorTotal = $(this).val();
            totalGeneral = totalGeneral + parseFloat(valorTotal);

        });

        $("#totalgeneral").val(totalGeneral.toFixed(2));
    });

    $("#cancelado").keyup(function (e) {
        var valorCancelado = $(this).val();
        valorCancelado = parseFloat(valorCancelado);

        var valorTotalGeneral = $("#totalgeneral").val();
        valorTotalGeneral = parseFloat(valorTotalGeneral);


        var valorCambio = valorCancelado - valorTotalGeneral;

        $("#cambio").val(valorCambio.toFixed(2));

        if (valorCambio >= 0) {
            $("#cambio").addClass("bg-success").removeClass('bg-danger');
        } else {
            $("#cambio").addClass("bg-danger").removeClass('bg-success');
        }
    });
});
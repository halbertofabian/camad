
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 27/11/2020 01:39
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#pqt_alumno").on("change", function () {

    var pqt_sku = $(this).val();

    var datos = new FormData()

    datos.append('btnBuscarPaquete', true)
    datos.append('pqt_sku', pqt_sku)

    $.ajax({

        url: urlApp + 'app/modulos/paquetes/paquetes.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            $(".div-info-paquete").addClass("d-none")
            $(".div-info-paquete").addClass("bg-gradient-info")

            $(".div_load").html(`<div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>`);

        },
        success: function (res) {
            $(".div_load").html(``);
            $(".div-info-paquete").removeClass("d-none")

            $("#pqt_nombre").html(`<strong>${res.pqt_nombre}</strong>`);

            $("#ins_costos").val(res.pqt_costo)
            var dtl_costos = JSON.parse(res.pqt_costo);

            $("#pqt_r_inscripcion").html(`${dtl_costos.costo_inscripcion}`);
            $("#pqt_r_examen").html(`${dtl_costos.costo_examen}`);
            $("#pqt_r_guia").html(`${dtl_costos.costo_guia}`);
            $("#pqt_r_incorporacion").html(`${dtl_costos.costo_incorporacion}`);
            $("#pqt_r_certificado").html(`${dtl_costos.costo_certificado}`);
            $("#pqt_r_semanal").html(`${dtl_costos.costo_semana}`);
            $("#pqt_r_semanas").html(`${res.pqt_duracion}`);

            setTimeout(function () {
                $(".div-info-paquete").removeClass("bg-gradient-info")
            }, 2000);
        },
    })

})

$(".btngenerarSKU").on("click", function () {
    var pqt_nombre = $("#pqt_nombre").val()
    var pqt_sku = "";

    if (pqt_nombre != "") {
        pqt_sku = pqt_nombre.replace(/\ /g, "_");
    } else {

        pqt_sku = Math.floor(Math.random() * 99999999);

    }

    $("#pqt_sku").val(pqt_sku);
})
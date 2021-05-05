
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 02/12/2020 17:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


$(".cps_aply_ok").on("click", function () {
    $("#cps_aply_matricula").removeClass("d-none");
    $("#cps_aply_matricula").attr("required", true);


})

$(".cps_aply").on("click", function () {
    $("#cps_aply_matricula").addClass("d-none");
    $("#cps_aply_matricula").attr("required", false);
})

$("#formAgregarCupones").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnCrearCupon", true);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/cupones/cupones.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)

            if (res.status) {

                swal({
                    title: "¡Muy bien!",
                    text: res.mensaje,
                    icon: "success",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        });

            } else {
                toastr.error(res.mensaje, 'Error')
            }

        }
    })
})
$("#formActualizarCupones").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnActualizarCupon", true);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/cupones/cupones.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)

            if (res.status) {

                swal({
                    title: "¡Muy bien!",
                    text: res.mensaje,
                    icon: "success",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,
                })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        });

            } else {
                toastr.error(res.mensaje, 'Error')
            }

        }
    })
})



$(".tablas tbody").on("click",'button.btnElimimarCupon', function () {

    var cps_codigo = $(this).attr("cps_codigo");
    swal({
        title: "¿Seguro de querer eliminar este cupón?",
        text: "El cupo con número " + cps_codigo + " será eliminado. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar cupón con número " + cps_codigo],
        dangerMode: false,
        closeOnClickOutside: false,
    })
            .then((willDelete) => {
                if (willDelete) {
                    var datos = new FormData();
                    datos.append("btnEliminarCupon", true);
                    datos.append("cps_codigo", cps_codigo);

                    $.ajax({
                        type: "POST",
                        url: urlApp + 'app/modulos/cupones/cupones.ajax.php',
                        data: datos,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        beforeSend: function () {

                        },
                        success: function (res) {

                            if (res.status) {
                                swal({
                                    title: "Muy bien",
                                    text: res.mensaje,
                                    icon: "success",
                                    buttons: [false, "Continuar"],
                                    dangerMode: true,
                                    closeOnClickOutside: false,

                                })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                window.location.reload();
                                            } else {
                                                window.location.reload();
                                            }
                                        });
                            } else {
                                toastr.error(res.mensaje, 'ERROR');
                            }

                        }
                    });
                }
            })
})
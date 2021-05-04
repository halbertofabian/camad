
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 10:46
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#formInscribirAlumno").on("submit", function (e) {

    e.preventDefault()
    var datos = new FormData(this)
    datos.append("btnInscribirAlumnos", true);
    $.ajax({

        url: urlApp + 'app/modulos/inscripciones/inscripciones.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {

            $('.btnInscribir').attr("disabled", true)
            $(".btnInscribir").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
           Creando inscripción ... `);

        },
        success: function (res) {

            
            if (res.status) {
                toastr.success(res.mensaje, 'Muy bien!')
                

                $(".btnInscribir").html(`Redirigiendo a ${res.pagina}`);

                setTimeout(function () {
                    location.href = res.pagina
                }, 3000);
                // swal({
                //     title: "¡Muy bien!",
                //     text: res.mensaje,
                //     icon: "success",
                //     buttons: [false, "Continuar"],
                //     dangerMode: true,
                //     closeOnClickOutside: false,
                // })
                //     .then((willDelete) => {
                //         if (willDelete) {
                //             location.href = res.pagina
                //         } else {
                //             location.href = res.pagina
                //         }
                //     });
            } else {
                $('.btnInscribir').attr("disabled", false)

                $(".btnInscribir").html(`Inscribir`);
                toastr.error(res.mensaje, '¡Error!')
            }
        }
    })


})

$(".btnCancelarInscripcion").on("click", function () {

    var fpg_id = $(this).attr("fpg_id");
    swal({
        title: "¿Seguro de querer cancelar está inscripción?",
        text: "La inscripcíón " + fpg_id + " será cancelada. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, cancelar cupón inscripcíón " + fpg_id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
            .then((willDelete) => {
                if (willDelete) {
                    var datos = new FormData();
                    datos.append("btnCancelarInscripcion", true);
                    datos.append("fpg_id", fpg_id);

                    $.ajax({
                        type: "POST",
                        url: urlApp + 'app/modulos/inscripciones/inscripciones.ajax.php',
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
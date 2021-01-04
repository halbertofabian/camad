
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$(".btnDisplayProductos").on("click", function () {

    var display = $(this).attr('data-display')
    if (display != "") {
        $("#card-filtro-producto").removeClass('d-none')
        $(this).attr('data-display', "")
        $(this).html(`<i class="fas fa-minus"></i>`)
    } else {

        $("#card-filtro-producto").addClass('d-none')
        $(this).attr('data-display', "d-none")
        $(this).html(`<i class="fas fa-plus"></i>`)

    }


})

$(".pds_content").mousemove(function () {
    var pds_id = $(this).attr('pds_id');
    $(".pds_id_move").addClass('d-none')
    $("#" + pds_id).removeClass('d-none')
})

$("#checkboxAllProducto").change("click", function () {


    if ($("#checkboxAllProducto").is(':checked')) {
        $(".pds_action_product").prop("checked", true)

    } else {
        $(".pds_action_product").prop("checked", false)
    }




})
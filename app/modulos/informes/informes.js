
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 17/01/2021 22:11
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
$(document).ready(function () {
    var datos = new FormData();
    cargarInforme2(datos);


});
$("#formInforme_1").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);



    datos.append("btnFiltrarInforme_1", true);

    $.ajax({

        url: urlApp + 'app/modulos/informes/informes.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton('Filtrar')
            // console.log(res)

            var html = "";

            var total_pago = 0;
            var bandera_pago = true;
            var monto_total = 0;
            $("#text-cert").html("")
            if (res != null) {
                res.forEach(ifs => {

                    if (ifs.ppg_concepto == $("#ifs_concepto").val()) {

                        if (ifs.ppg_adeudo == 0) {
                            total_pago += 1;
                        }

                    } else {
                        bandera_pago = false;
                    }

                    monto_total += Number(ifs.ppg_total);
                    html +=
                            `
                            <tr>
                                <td>${ifs.ppg_id}</td>
                                <td>${ifs.ppg_ficha_pago}</td>
                                <td>${ifs.ppg_ficha_venta}</td>

                                <td>${ifs.ppg_monto}</td>

                                <td> <strong class="text-primary"> ${ifs.ppg_total} </strong> </td>
                                <td>${ifs.ppg_descuento}</td>

                                <td>${ifs.ppg_concepto.replace('PPG_', '')}</td>
                                <td><strong class="text-primary"> ${ifs.ppg_adeudo} </strong></td>
                                <td>${ifs.ppg_fecha_registro}</td>
                                <td>${ifs.ppg_usuario_registro}</td>
                            </tr>

                        `;

                });

                $("#tbodyInforme_1").html(html)
                if (bandera_pago) {
                    $("#text-cert").html(`TOTAL  ${$("#ifs_concepto").val().replace('PPG_', '')} PAGADOS(AS): <strong class="text-primary">${total_pago}</strong>`);

                }
                $("#text-total").html(`TOTAL PAGADO <strong class="text-primary">${new Intl.NumberFormat().format(monto_total)}</strong>`)

                $("#btn_export_result").removeClass("d-none")

                $("#btn_export_result").attr("href", urlApp + "app/lib/export/informe-1-fichas.php?ifs_fecha_inicio=" + $("#ifs_fecha_inicio").val() + "&ifs_fecha_fin=" + $("#ifs_fecha_fin").val() + "&ifs_concepto=" + $("#ifs_concepto").val());
            }
        },
    })
})

$("#formInforme_2").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    cargarInforme2(datos);

})




function cargarInforme2(datos) {


    fecha_inicial = $('#fpg_fecha_registro_inicio').val() + 'T00:00';
    fecha_final = $('#fpg_fecha_registro_fin').val() + 'T23:59';
    ppg_id_sucursal = $('#ppg_id_sucursal').val();

    datos.append("btnFiltrarInforme_2", true);
    datos.append("fpg_fecha_registro_inicio", fecha_inicial);
    datos.append("fpg_fecha_registro_fin", fecha_final);
    datos.append("ppg_id_sucursal", ppg_id_sucursal);

    $.ajax({

        url: urlApp + 'app/modulos/informes/informes.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton('Filtrar')
            console.log(res)

            var html = "";
            var count = 0;

            $("#text-cert").html("")
            console.log(res.adeudos);
            if (res != null) {
                res.data.forEach(ifs => {


                    html +=
                            `
                            <tr>
                                <td>${ifs.usr_matricula}</td>
                                <td>${ifs.usr_nombre + " " + ifs.usr_app + " " + ifs.usr_apm}</td>
                                <td>${ifs.pqt_nombre}</td>
                                <td> <a href="${urlApp+'inscripciones/fichas/'+ifs.fpg_id}" target="_blank">${ifs.fpg_id}</a>  </td>
                                <td>${ifs.fpg_fecha_registro}</td>
                                <td>${ifs.usr_usuario_registro}</td>
                                <td>${ifs.fpg_usuario_registro}</td>
                                <td>$ ${$.number(ifs.ppg_total, 2)}</td>

                                <td>$ ${$.number(ifs.ppg_adeudo, 2)}</td>
                                <td><a href="${urlApp+'alumno/'+ifs.usr_id+'/kerdex-fichas'}" target="_blank">$ ${res.adeudos[count]}</a></td>
                                
                            </tr>

                        `;
                    count++;
                });

                $("#tbodyInforme_2").html(html)

            }
        },
    })
}
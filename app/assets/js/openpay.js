$(document).ready(function () {

    OpenPay.setId('mzumskvckxazgxy6l9xu');
    OpenPay.setApiKey('pk_99284f8605594e8dbd1043c0c98a65fc');
    OpenPay.setSandboxMode(true);
    //Se genera el id de dispositivo
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

    $('#save-button').on('click', function (event) {
        event.preventDefault();
        $("#save-button").prop("disabled", true);
        OpenPay.token.extractFormAndCreate('customer-form', success_callbak, error_callbak);
    });

    var success_callbak = function (response) {
        var token_id = response.data.id;
        //$('#token_id').val(token_id);
        

        $("#save-button").prop("disabled", false);
        var datos = new FormData()
        datos.append("token_id", token_id)
        datos.append("deviceSessionId", deviceSessionId)
        datos.append("btnPagoOpenPay", true)

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                startLoadButton()
            },
            success: function (res) {

                if (res.status) {
                    stopLoadButton('Redirigiendo...')
                    toastr.success(res.mensaje, 'Muy bien!')
                    setTimeout(function () {
                        location.href = res.pagina
                    }, 1000);
                }

            }
        })

    }
    var error_callbak = function (response) {
        var desc = response.data.description != undefined ? response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#save-button").prop("disabled", false);
    };

});
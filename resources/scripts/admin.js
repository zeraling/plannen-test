/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {


    $(document).on('click', '.btnEdit', function () {
        var cuId = $(this).attr('data-id');

        var nombre = $('#customerId' + cuId).attr('data-nombre');
        var apellido = $('#customerId' + cuId).attr('data-apellido');
        var direccion = $('#customerId' + cuId).attr('data-direccion');
        var telefono = $('#customerId' + cuId).attr('data-telefono');

        $('#txtCustomerId').val(cuId);

        $('#txtNombre').val(nombre);
        $('#txtApellido').val(apellido);
        $('#txtDireccion').val(direccion);
        $('#txtTelefono').val(telefono);

        $("#dialog-edit").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                Actualiza: ActualizarProspecto,
                Cerrar: function () {
                    $(this).dialog("close");
                }
            }
        });
    })
});


function ActualizarProspecto() {


    var data = {
        customerId: $('#txtCustomerId').val(),
        nombre: $('#txtNombre').val(),
        apellido: $('#txtApellido').val(),
        direccion: $('#txtDireccion').val(),
        telefono: $('#txtTelefono').val(),
        update: true
    }

    $('#opLogs').removeClass('hide');
    $('#logEvent').append(JSON.stringify(data)+'<br>');

    $("#dialog-edit").dialog("close");

}
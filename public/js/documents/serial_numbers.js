
function fillSerialNumbers(serial_number_id = null){
    let equipment_id = $("#equipment_select").val();
    if(equipment_id == ''){
        $("#serial_number_select").html('');
        return;
    }

    $.ajax({
        'url' : '/serial-numbers-by-equipment/'+equipment_id,
        'type' : 'GET',
        'success': (response) => {
            let serial_numbers = response;
            let options = '';
            serial_numbers.forEach((serial_number) => {
                let selected = '';
                if(serial_number_id && serial_number_id == serial_number.id) selected = 'selected';
                options += `<option value=\"${serial_number.id}\" ${selected}>${serial_number.serial_number}</option>`;
            });
            $("#serial_number_select").html(options);
        }
    });

}

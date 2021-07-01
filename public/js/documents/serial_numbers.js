
function fillSerialNumbers(serial_number_id = null){
    let equipment_id = $("#equipment_id_select").val();
    if(equipment_id == ''){
        $("#serial_number_id_select").html('');
        return;
    }

    $.ajax({
        'url' : '/serial-numbers-by-equipment/'+equipment_id,
        'type' : 'GET',
        'success': (response) => {
            let serial_numbers = response;
            let options = `<option value="" selected> - select serial number - </option>`;
            serial_numbers.forEach((serial_number) => {
                let selected = '';
                if(serial_number_id && serial_number_id == serial_number.id) selected = 'selected';
                options += `<option value=\"${serial_number.id}\" ${selected}>${serial_number.serial_number}</option>`;
            });
            $("#serial_number_id_select").html(options);
        }
    });

}


function fillEquipment(equipment_id = null){

    $.ajax({
        'url' : '/get-equipment',
        'type' : 'GET',
        'success': (response) => {
            let equipment = response;
            let options = `<option value="" selected> - select serial number - </option>`;
            equipment.forEach((eq) => {
                let selected = '';
                if(equipment_id && equipment_id == eq.id) selected = 'selected';
                options += `<option value=\"${eq.id}\" ${selected}>${eq.name}</option>`;
            });
            $("#equipment_id_select").html(options);
        }
    });

}

$(document).ready(fillEquipment)

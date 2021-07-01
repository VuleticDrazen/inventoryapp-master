function confirmTicketAdd(event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#add_ticket");
        $("#add_ticket").submit();
    }
}

function fillOfficers(officer_id = null){
    let ticket_request_type_id = $("#ticket_request_type_select").val();
    ;
    if(ticket_request_type_id == ''){
        $("#officer_id_select").html('');
        return;
    }
    let role_id;
    if(ticket_request_type_id == 2){
         role_id = 2;
    }else{
         role_id = 3;
    }

    $.ajax({
        'url' : '/officers/'+role_id,
        'type' : 'GET',
        'success': (response) => {
            let officers = response;
            let options = `<option value="" selected>- select officer -</option>`;
            officers.forEach((officer) => {
                let selected = '';
                if(officer_id && officer_id == officer.id) selected = 'selected';
                options += `<option value=\"${officer.id}\" ${selected}>${officer.name}</option>`;
            });
            $("#officer_id_select").html(options);


        }
    });

}


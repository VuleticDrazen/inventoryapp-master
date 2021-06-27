
function fillStatuses(status_id = null) {

    $("#status_id_select").html('');

    $.ajax({
        'url': '/statuses',
        'type': 'GET',
        'success': (response) => {
            let statuses = response;
            let options = '';
            statuses.forEach((status) => {
                let selected = '';
                if (status_id && status_id == status.id) selected = 'selected';
                options += `<option value=\"${status.id}\" ${selected}>${status.name}</option>`;
            });
            $("#status_id_select").html(options);
        }
    });
}

$('.clickable-row').click((e) => {
    window.location.href = $(e.currentTarget).data('href');
});

function confirmTicketEdit(ticket_id, event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#edit_ticket_"+ticket_id);
        $("#edit_ticket"+ticket_id).submit();
    }
}

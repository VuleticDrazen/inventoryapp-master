$(document).ready(function(){
    $('#exportButton').click(function(){
        $('#exportModal').modal('show')
    });
});


function fillUsers(user_id = null){
        $("#user_id_select").html('');
    $.ajax({
        'url' : '/get-users',
        'type' : 'GET',
        'success': (response) => {
            let users = response;
            let options = `<option value="" selected> - select user - </option>`;
            users.forEach((user) => {
                let selected = '';
                if(user_id && user_id == user.id) selected = 'selected';
                options += `<option value=\"${user.id}\" ${selected}>${user.name}</option>`;
            });
            $("#user_id_select").html(options);
        }
    });

}


function fillEquipmentCategories(equioment_category_id = null){
    $("#user_id_select").html('');
    $.ajax({
        'url' : '/get-users',
        'type' : 'GET',
        'success': (response) => {
            let users = response;
            let options = `<option value="" selected> - select user - </option>`;
            users.forEach((user) => {
                let selected = '';
                if(user_id && user_id == user.id) selected = 'selected';
                options += `<option value=\"${user.id}\" ${selected}>${user.name}</option>`;
            });
            $("#user_id_select").html(options);
        }
    });

}


$(document).ready(fillUsers())



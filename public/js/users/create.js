function fillPositions(position_id = null){
    let department_id = $("#department_select").val();
    if(department_id == ''){
        $("#position_select").html('');
        return;
    }

    $.ajax({
       'url' : '/positions-by-department/'+department_id,
       'type' : 'GET',
       'success': (response) => {
           let positions = response;
           let options = `<option value="" selected>- select position -</option>`;
           positions.forEach((position) => {
               let selected = '';
               if(position_id && position_id == position.id) selected = 'selected';
               options += `<option value=\"${position.id}\" ${selected}>${position.name}</option>`;
           });
           $("#position_select").html(options);
       }
    });

}

function fillRoles(role_id = null){

    $("#role_select").html('');

    $.ajax({
        'url' : '/roles',
        'type' : 'GET',
        'success': (response) => {
            let roles = response;
            let options = `<option value="" selected>- select role -</option>`;
            roles.forEach((role) => {
                let selected = '';
                if(role_id && role_id == role.id) selected = 'selected';
                options += `<option value=\"${role.id}\" ${selected}>${role.name}</option>`;
            });
            $("#role_select").html(options);
        }
    });

}
function confirmUserAdd(event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#add_user");
        $("#add_user").submit();
    }
}

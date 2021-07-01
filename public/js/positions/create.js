function fillDepartments(department_id = null) {

    $("#department_select").html('');

    $.ajax({
        'url': '/departmentsFill',
        'type': 'GET',
        'success': (response) => {
            let departments = response;
            let options = `<option value="" selected> -select department- </option>`;
            departments.forEach((department) => {
                let selected = '';
                if (department_id && department_id == department.id) selected = 'selected';
                options += `<option value=\"${department.id}\" ${selected}>${department.name}</option>`;
            });
            $("#department_select").html(options);
        }
    });

}
    function confirmPositionAdd(event){
        event.stopPropagation();
        if(confirm('Da li ste sigurni?')){
            console.log("#position_user");
            $("#add_position").submit();
        }

}

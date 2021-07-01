$(document).ready(function(){
    $('#exportButton').click(function(){
        $('#exportModal').modal('show')
    });
});


function fillCategories(category_id = null){
        $("#category_id_select").html('');
    $.ajax({
        'url' : '/get-categories',
        'type' : 'GET',
        'success': (response) => {
            let categories = response;
            let options = `<option value="" selected> - select category - </option>`;
            categories.forEach((category) => {
                let selected = '';
                if(category_id && category_id == category.id) selected = 'selected';
                options += `<option value=\"${category.id}\" ${selected}>${category.name}</option>`;
            });
            $("#category_id_select").html(options);
        }
    });

}


$(document).ready(fillCategories())



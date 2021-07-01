function confirmDepartmentDelete(department_id, event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#delete_form_"+department_id);
        $("#delete_form_"+department_id).submit();
    }
}
$('.clickable-row').click((e) => {
    window.location.href = $(e.currentTarget).data('href');
});

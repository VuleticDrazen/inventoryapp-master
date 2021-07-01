function confirmDepartmentAdd(event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#add_department");
        $("#add_department").submit();
    }
}

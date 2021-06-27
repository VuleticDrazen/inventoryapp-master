function confirmAddNewEquipment(event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#add_new_equipment");
        $("#add_new_equipment").submit();
    }
}

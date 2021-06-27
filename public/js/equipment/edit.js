function confirmEditEquipment(equipment_id, event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#edit_equipment_"+equipment_id);
        $("#edit_equipment_"+equipment_id).submit();
    }
}


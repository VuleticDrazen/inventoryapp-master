
function confirmUserEdit(user_id, event){
    event.stopPropagation();
    if(confirm('Da li ste sigurni?')){
        console.log("#edit_user_"+user_id);
        $("#edit_user_"+user_id).submit();
    }
}

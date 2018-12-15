$(function(){
    // all global function are located to assets/js/script-me.js
    checkboxEditTable(URL+"section/edit/");
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this section?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#editForm').submit(function(){
        var r = confirm('Are you sure you want to edit this section?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#deleteForm').submit(function(){
        var r = confirm('Are you sure you want to delete this section/s?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
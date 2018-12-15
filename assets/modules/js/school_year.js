$(function(){
    // all global function are located to assets/js/script-me.js
    checkboxEditTable(URL+"school_year/edit/");
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this year?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#editForm').submit(function(){
        var r = confirm('Are you sure you want to edit this year?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#deleteForm').submit(function(){
        var r = confirm('Are you sure you want to delete this year/s?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
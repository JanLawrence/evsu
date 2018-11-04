$(function(){
    $('#addForm').submit(function(){
        var r = confirm('Are you sure?');
        if(r ==  true){
            return;
        }
    })
})
$(function(){
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this grades?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
$(function(){
    $('#accountForm').submit(function(){
        var r = confirm('Are you sure you want to update your account?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
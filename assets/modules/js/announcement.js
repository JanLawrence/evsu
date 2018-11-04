$(function(){
    // all global function are located to assets/js/script-me.js
    checkboxEditTable(URL+"announcements/edit/");
    //on click view more
    $('table').on('click', '.view-more', function(){
        var announcement = $(this).attr('announce'); // get announcement from attr announce of the button
        var date = $(this).attr('adate'); // get date from attr adate of the button
        var teacher = $(this).attr('tname'); // get teacher from attr tname of the button
        var subject = $(this).attr('sname'); // get subject from attr sname of the button

        $('#viewModal').find('.teacher').text(teacher); //display teacher on modal
        $('#viewModal').find('.date').text(date); //display date on modal
        $('#viewModal').find('.subject').text(subject); //display subject on modal
        $('#viewModal').find('.announcement').text(announcement); //display feedback on modal

        $('#viewModal').modal('toggle'); //toggle modal
    })
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this announcement?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#editForm').submit(function(){
        var r = confirm('Are you sure you want to edit this announcement?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#deleteForm').submit(function(){
        var r = confirm('Are you sure you want to delete this announcement/s?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
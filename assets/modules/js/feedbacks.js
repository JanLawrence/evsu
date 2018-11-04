$(function(){
    //on click view more
    $('table').on('click', '.view-more', function(){
        var feedback = $(this).attr('fback'); // get feedback from attr fback of the button
        var date = $(this).attr('fdate'); // get date from attr fdate of the button
        var teacher = $(this).attr('tname'); // get teacher from attr tname of the button
        var subject = $(this).attr('sname'); // get subject from attr sname of the button

        $('#viewModal').find('.teacher').text(teacher); //display teacher on modal
        $('#viewModal').find('.date').text(date); //display date on modal
        $('#viewModal').find('.subject').text(subject); //display subject on modal
        $('#viewModal').find('.feedback').text(feedback); //display feedback on modal

        $('#viewModal').modal('toggle'); //toggle modal
    })

    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this feedback?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#deleteForm').submit(function(){
        var r = confirm('Are you sure you want to delete this feedback/s?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
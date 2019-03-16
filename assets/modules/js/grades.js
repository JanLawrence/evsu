$(function(){
    $('select[name="gradelevel"]').change(function(){
        var grade = $(this).val();
        $.post(URL+'section/gradePerSection',{'grade': grade})
        .done(function(returnData){
            var data = $.parseJSON(returnData);
            var append = "";
            $.each(data, function(key,a){
                append += '<option value="'+a.id+'">'+a.section+'</option>';
            })
            $('select[name="section"]').html(append);
        })
    })
    $('select[name="student"]').change(function(){
        var year = $('select[name="school_year"]').val();
        var section = $('select[name="section"]').val();
        var student = $(this).val();

        $.post(URL + 'grades/returnStudentGrades', {'year':year,'student':student,'section':section})
        .done(function(returnData){
            $('.returnHere').html(returnData);
        })
    })
    $('select[name="section"]').change(function(){
        var section = $(this).val();
        $.post(URL + 'grades/returnStudentListPerSec', {'section':section})
        .done(function(returnData){
            var data = $.parseJSON(returnData);
            var append = '<option selected disabled value=""></option>';
            $.each(data, function(key,a){
                append += '<option value="'+a.id+'">'+a.last_name+', '+a.first_name+' '+a.middle_name+'</option>';
            })
            $('select[name="student"]').html(append);
        })
    })
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this grades?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#lockForm').submit(function(){
        var r = confirm('Are you sure you want to add this grades?');
        var form = $(this).serialize();
        if(r ==  true){
            $.post(URL + 'grades/lockGrades', form)
            .done(function(returnData){
                alert('Grading(s) successfully locked.');
                location.reload();
            })
            return false;
        }else{
            return false;
        }
    })
    $('.lockbtn').click(function(){
        $('#lockModal').modal('toggle');
    })
})
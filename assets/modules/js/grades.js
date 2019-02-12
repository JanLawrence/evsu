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
        var student = $(this).val();

        $.post(URL + 'grades/returnStudentGrades', {'year':year,'student':student})
        .done(function(returnData){
            $('.returnHere').html(returnData);
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
})
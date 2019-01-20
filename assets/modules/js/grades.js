$(function(){
    $('select[name="gradelevel"]').change(function(){
        var grade = $(this).val();
        $.post(URL + 'grades/getSections', {'grade': grade})
        .done(function(returnData){
            var data = $.parseJSON(returnData);
            var append = '<option value="" selected disabled>Select Section</option>';
            $.each(data, function(key,a){
                append += '<option value="'+a.id+'">'+a.section+'</option>';
            })
            $('select[name="section"]').html(append);

        })
    })
    $('select[name="subject"]').change(function(){
        var year = $('select[name="school_year"]').val();
        var grade = $('select[name="gradelevel"]').val();
        var section = $('select[name="section"]').val();
        var subject = $(this).val();

        $.post(URL + 'grades/returnStudentGrades', {'grade': grade, 'year':year, 'section': section, 'subject':subject})
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
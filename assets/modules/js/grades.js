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
    $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this grades?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
})
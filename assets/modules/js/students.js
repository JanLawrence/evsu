$(function(){
     // all global function are located to assets/js/script-me.js
     checkboxEditTable(URL+"students/edit/");
     $('#addForm').submit(function(){
        var r = confirm('Are you sure you want to add this student?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#editForm').submit(function(){
        var r = confirm('Are you sure you want to edit this student?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('#deleteForm').submit(function(){
        var r = confirm('Are you sure you want to delete this student/s?');
        if(r ==  true){
            return;
        }else{
            return false;
        }
    })
    $('select[name="grade"]').change(function(){
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
})
$(function(){
    $('#advisoryTable').on('click', '.view-grade', function(){
        var id = $(this).attr('stud-id');
        var year = $('select[name="school_year"]').val();
        $.post(URL + 'advisory/viewGrade', {'id': id, 'year':year})
        .done(function(returnData){ 
            $('#viewModalAdvisory').html(returnData);
            $('#viewModal').modal('toggle');
        })
    })
    $('#advisoryTable').on('click', '.export-grade', function(){
        var id = $(this).attr('stud-id');
        var year = $('select[name="school_year"]').val();
        window.location.href = URL + 'advisory/exportGrade?id='+id+'&year='+year;
    })
})
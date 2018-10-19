$(function(){ //toggle ready jquery
    
    //toggle DataTables Library
    var table = $('.datatables').DataTable({
        "bLengthChange": false,
 
    }); 
    $('.search-box-input').on( 'keyup', function () {
        table.search( this.value ).draw();
    });


    //check all - tables 
    $('table thead').find('input').change(function(){
        var checkbox = $(this).closest('table').children('tbody').find('input');
        if ( $(this).is(':checked') ) { // if checkbox is cheked -> check all tables
            checkbox.prop('checked', true);
        } else {
            checkbox.prop('checked', false);
        }
    })

    //selectpicker
    $('.select2').select2();

})
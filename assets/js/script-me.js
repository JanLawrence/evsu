$(function(){ //toggle ready jquery
    //toggle select2 Library
    $('.select2').select2();

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

//global functions

// edit function for selecting line to edit
function checkboxEditTable(link){ // link variable is passed (link of the edit page)
    // click edit button
    $('.btn-edit').click(function(){
        let checkbox = $('.table-check:checked');
        let check = checkbox.length;
        //check if only 1 checkbox is selected
        if(check > 1 || check <= 0){ //if greater than 1 or less than or equal to 0
            alert('Please select only one to edit');
        } else { //else proceed to edit page
            location.href = link+checkbox.val(); 
        }
    })
}
function checkboxViewTable(link){ // link variable is passed (link of the view page)
    // click view button
    $('.btn-view').click(function(){
        let checkbox = $('.table-check:checked');
        let check = checkbox.length;
        //check if only 1 checkbox is selected
        if(check > 1 || check <= 0){ //if greater than 1 or less than or equal to 0
            alert('Please select only one to edit');
        } else { //else proceed to edit page
            location.href = link+checkbox.val(); 
        }
    })
}
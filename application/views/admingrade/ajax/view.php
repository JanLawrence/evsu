<div class="form-group row">
    <div class="col-md-3">
        <label>Student</label>
        <select name="student" id="studentList" class="form-control">
            <option value="" selected disabled>Select Student</option>
            <?php foreach ($students as $each) {?>
                <option value="<?= $each->id?>"><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="table-responsive returnHere2">
</div>
<script>
    $('.returnHere').on('change', '#studentList', function(){
        var year = "<?= $_POST['year']?>";
        var teacher = "<?= $_POST['teacher']?>";
        var student = $(this).val();
        $.post(URL + 'grades/returnStudentGrades2', {'year':year,'student':student,'teacher':teacher})
        .done(function(returnData){
            $('.returnHere2').html(returnData);
        })
    })
</script>
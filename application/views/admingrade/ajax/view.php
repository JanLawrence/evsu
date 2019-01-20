<table class="table table-hovered table-striped">
    <thead>
        <tr>
            <th>School Id</th>
            <th>Student Name</th>
            <th>1st</th>
            <th>2nd</th>
            <th>3rd</th>
            <th>4th</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($grade as $each):?>
    <tr>
        <td style="width:10%"><?= $each->school_id?></td>
        <td style="width:40%"><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name ?></td>
        <input name="stud_id[]" type="hidden" value="<?= $each->student_id?>">
        <td style="width:10%"><?= $each->period_1?></td>
        <td style="width:10%"><?= $each->period_2?></td>
        <td style="width:10%"><?= $each->period_3?></td>
        <td style="width:10%"><?= $each->period_4?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
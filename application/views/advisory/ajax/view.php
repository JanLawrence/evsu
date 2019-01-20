<h5 class="text-center">REPORT ON PROGRESS</h5>
<h6 class="text-center">ULAT TUNGKOL</h6>
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2"><strong>LEARNING AREAS</strong><br>LARANGAN NG PAG AARAL</th>
            <th colspan="4"><strong>GRADING TERMS</strong><br>MARKAHAN</th>
            <th rowspan="2"><strong>Final Rating</strong><br>Huling Marka</th>
            <th rowspan="2"><strong>Remarks</strong><br>Pasya</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </tr>
    </thead>
    <tbody>
        <?php $total =0; foreach($grade as $each):?>
            <tr>
                <td><?= $each->subject_name?></td>
                <td><?= $each->period_1?></td>
                <td><?= $each->period_2?></td>
                <td><?= $each->period_3?></td>
                <td><?= $each->period_4?></td>
                <td><?= $each->average?></td>


                <td><?= $each->remarks?></td>
            </tr><?php $total+=$each->average?>
        <?php endforeach;?>
            <tr>
                <td colspan="3">Grading Plan used: Averaging</td>
                <td colspan="2">General Average:</td>
                <td><?= $overall = ($total / count($grade))?></td>
                <td><?= $overall >= 75 ? 'Passed' : ($overall < 75 ? 'Failed' : '')?></td>
            </tr>
    </tbody>
    <tbody>
            <tr>
                <td colspan="7" style="background: #000"></td>
            </tr>
            <tr>
                <td>Parent's Signature</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>1st Quarter</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>2nd Quarter</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>3rd Quarter</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td>4th Quarter</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="7" style="background: #000"></td>
            </tr>
            <tr>
                <th>Description</th>
                <th colspan="3">Grading Scale</th>
                <th colspan="3">Remarks</th>
            </tr>
            <tr>
                <td>Outstanding</td>
                <td colspan="3">90-100</td>
                <td colspan="3">Passed</td>
            </tr>
            <tr>
                <td>Very Satisfactory</td>
                <td colspan="3">85-89</td>
                <td colspan="3">Passed</td>
            </tr>
            <tr>
                <td>Satisfactory</td>
                <td colspan="3">80-84</td>
                <td colspan="3">Passed</td>
            </tr>
            <tr>
                <td>Fairly Satisfactory</td>
                <td colspan="3">75-79</td>
                <td colspan="3">Passed</td>
            </tr>
            <tr>
                <td>Did not meet expectation</td>
                <td colspan="3">Below 75</td>
                <td colspan="3">Failed</td>
            </tr>
    </tbody>
</table>
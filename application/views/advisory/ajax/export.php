<?php
 	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=grade.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

?>
<style>
	.table
	{
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}
	table
	{
		border-spacing: 0;
		border-collapse: collapse;
	}
	table
	{
		white-space: normal;
		line-height: normal;
		font-weight: normal;
		font-size: medium;
		font-variant: normal;
		font-style: normal;
		color: -webkit-text;
		text-align: start;
	}
	table
	{
		display: table;
		border-collapse: separate;
		border-spacing: 2px;
		border-color: grey;
	}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
}

	tr
	{
		display: table-row;
		vertical-align: inherit;
		border-color: inherit;
	}
	.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		padding: 8px;
		line-height: 1.42857143;
		vertical-align: top;
		border-top: 1px solid #ddd;
	}
	th
	{
		font-weight: bold;
	}
	td, th
	{
		display: table-cell;
        vertical-align: inherit;
        border: 1px solid #000;

	}
	.table>tbody>tr>td,
	.table>tbody>tr>th,
	.table>tfoot>tr>td,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	 .table>thead>tr>th
	 {
		padding: 8px;
		line-height: 1.42857143;
		vertical-align: top;
		border-top: 1px solid #ddd;
	}
	td, th
	{
		display: table-cell;
		vertical-align: inherit;
	}
	.table th, td
	{
		text-align: center;
	}
	.success
	{
		background:#d6e9c6
	}
	.pull-right
	{
		float:right
	}
</style>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="7"><strong>REPORT ON PROGRESS</strong><br>ULAT TUNGKOL</th>
        </tr>
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
                <td><?= $each->first_grade?></td>
                <td><?= $each->second_grade?></td>
                <td><?= $each->third_grade?></td>
                <td><?= $each->fourth_grade?></td>
                <td><?= $each->average?></td>
                <td><?= $each->remarks?></td>
            </tr><?php $total+=$each->average?>
        <?php endforeach;?>
            <tr>
                <td colspan="3">Grading Plan used: Averaging</td>
                <td colspan="2">General Average:</td>
                <td><?= $overall= ($total / count($grade))?></td>
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
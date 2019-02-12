<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Grades</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Grades</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="teachers/delete" method="post" id="deleteForm">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>School Year</label>
                                    <select name="school_year" id="" class="form-control">
                                        <?php foreach($sy as $each):?>
                                            <option value="<?= $each->id?>"> <?= $each->sy_from.' - '.$each->sy_to?></option>
                                        <?php endforeach;?> 
                                    </select>
                                </div>
                            </div>
                            <div class="search-box">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control search-box-input" placeholder="Search">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Grade</th>
                                            <th>Section Name</th>
                                            <th>Adviser</th>
                                            <!-- <th>Status</th> -->
                                            <th>View</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($sub as $each): ?>
                                        <tr>
                                            <td><?= $each->grade?></td>
                                            <td><?= $each->section ?></td>
                                            <td><?= $each->t_adviser_name?></td>
                                            <!-- <td></td> -->
                                            <td>
                                                <a href="#" 
                                                    data-teacher="<?=$each->t_adviser_id?>"
                                                    class="btnViewGrade">
                                                    View
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    data-teacher="<?=$each->t_adviser_id?>"
                                                    class="btnChangeGrade">
                                                    Change
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="margin-top: 120px;">
            <div class="modal-header">
                <h5 class="modal-title"> Grades</h5>
            </div>
            <div class="modal-body">
                 <div class="row">
                    <div class="col-sm-12">
                        <p>Grade: <span class="grade" style="font-weight: bolder"></span></p>
                        <p>Section Name: <span class="section" style="font-weight: bolder"></span></p>
                        <p>Adviser: <span class="adviser" style="font-weight: bolder"></span></p>
                        <p>Year: <span class="year" style="font-weight: bolder"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 returnHere">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('table').on('click', '.btnViewGrade', function(){
            var section = $(this).attr('data-section');
            var subject = $(this).attr('data-subject');
            var teacher= $(this).attr('data-teacher');
            var grade = $(this).attr('data-grade');
            var year = $('select[name="school_year"]').val();
            var year_name = $('select[name="school_year"] option:selected').text();

            var grade_name = $(this).closest('tr').find('td:nth-child(1)').text();
            var section_name = $(this).closest('tr').find('td:nth-child(2)').text();
            var adviser_name = $(this).closest('tr').find('td:nth-child(3)').text();
            $('#viewModal').find('span.grade').text(grade_name);
            $('#viewModal').find('span.section').text(section_name);
            $('#viewModal').find('span.adviser').text(adviser_name);
            $('#viewModal').find('span.year').text(year_name);
            $.post(URL + 'admingrade/viewGrade', {'teacher': teacher, 'year':year})
            .done(function(returnData){
                $('.returnHere').html(returnData);
            })
            $('#viewModal').modal('toggle')
        })
        $('table').on('click', '.btnChangeGrade', function(){
            var teacher= $(this).attr('data-teacher');
            if(confirm('Do you want to change the status?')){
                $.post(URL + 'grades/unlockGrades', {'id': teacher})
                .done(function(returnData){
                    alert('Success');
                })
                return false;
            } else {
                return false;
            }
        })
    })
</script>
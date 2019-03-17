<?php 

    $userData = $this->session->userdata['user']; 

    if($userData->user_type == 'parent'){
        // $userData->user_type = 'guardian';
        $userType = 'guardian';
    } else {
        $userType = 'teacher';
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-comments"></i> Chat</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-5 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('inbox')?>">Inbox</a></li>
                        <li class="breadcrumb-item active">Chat</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <h6 class="mb-4"><i class="ti-comments"></i> <?= $user[0]->name?></h6>
                <?php if(!empty($chat)): ?>
                <?php foreach($chat as $each): ?>
                <?php if($each->user_type == $userType): ?>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="card <?= $each->user_type == 'teacher' ? 'text-white bg-primary' : 'bg-light' ?> mb-3">
                            <div class="card-body" > 
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= $each->user_type == 'teacher' ? $each->teacher_name : $each->parent_name ?><p>
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= date('F d, Y H:i: A', strtotime($each->content_date))?><p>
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= $each->content ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>  
                <div class="row">
                    <div class="col-md-8">
                        <div class="card <?= $each->user_type == 'teacher' ? 'text-white bg-primary' : 'bg-light' ?> mb-3">
                            <div class="card-body" > 
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= $each->user_type == 'teacher' ? $each->teacher_name : $each->parent_name ?><p>
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= date('F d, Y H:i: A', strtotime($each->content_date))?><p>
                                <p style="<?= $each->user_type == 'teacher' ? 'color: #fff!important' : '' ?>"><?= $each->content ?><p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div> 
                <?php endif; ?>   
                <?php endforeach; ?>   
                <?php else:?>
                    <div class="card">
                        <div class="card-body"> 
                            No Messages
                        </div>
                    </div>
                <?php endif;?>
                <form action="<?= base_url('inbox/addChat')?>" method="post">
                <div class="card">
                    <div class="card-body"> 
                        <div class="form-group">
                            <input name="id" type="hidden" value="<?= $id?>"></textarea>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
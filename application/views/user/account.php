<?php $this->load->view('templates/header')?>
    <div id="page-wrapper">
        <div id="info-header">
            <h3>student personal details</h3>
        </div>
        <?php if(function_exists(success_message())):?>
              <?php echo success_message();?>
      <?php elseif(function_exists(error_message())):?>
              <?php echo error_message()?>
      <?php endif;?>
        <div class="container-acct">
            <?php foreach ($student_infos as $info):?>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] ===  $info->id):?>
                    <div class="container-item img-info">
                        <div id="full-name">
                            <p><?=$info->first_name.' '.$info->surname?></p>
                        </div>
                        <img src="<?=base_url('assets/images/'.$info->image)?>" alt="profile-img">
                    </div>
                    <div class="container-item acct-info">
                        <div class="info-one">
                            <p class="first-p">student ID:</p>
                            <p class="second-p"><?=$info->id?></p>
                        </div>
                        <div class="info-two">
                            <p class="first-p">FirstName:</p>
                            <p class="second-p"><?=$info->first_name?></p>
                        </div>
                        <div class="info-one">
                            <p class="first-p">Surname:</p>
                            <p class="second-p"><?=$info->surname?></p>
                        </div>
                        <div class="info-two">
                            <p class="first-p">Username:</p>
                            <p class="second-p"><?=$info->username?></p>
                        </div>
                        <div class="info-one">
                            <p class="first-p">Email:</p>
                            <p class="second-p"><?=$info->email?></p>
                        </div>
                        <div class="info-two">
                            <p class="first-p">DOB:</p>
                            <p class="second-p"><?=format_date($info->date_of_birth)?></p>
                        </div>
                        <div class="info-one">
                            <p class="first-p">Gender:</p>
                            <p class="second-p"><?=$info->gender?></p>
                        </div>
                        <div class="info-two">
                            <p class="first-p">Date of Reg:</p>
                            <p class="second-p"><?=format_date($info->created_at)?></p>
                        </div>
                        <?php if ($info->activated == 0):?>
                            <div class="info-one">
                                <p class="first-p">Status:</p>
                                <p class="second-p">De-activated</p>
                            </div>
                        <?php elseif ($info->activated == 1):?>
                            <div class="info-one">
                                <p class="first-p">Status:</p>
                                <p class="second-p">Activated</p>
                            </div>
                        <?php endif;?>
                        <div class="edi-btn">
                            <a href="<?=site_url('students/edit/').$info->id?>" class="btn">Edit</a>
                        </div>
                    </div>
                <?php else:?>
                <?php show_error('<p style="font-size:3em;">FORBIDDEN</p>', 401)?>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>
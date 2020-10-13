<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/header')?>
    <div class="img">
        <img src="<?=base_url('assets/images/profile.png')?>" alt="profile-img">
    </div>
     <div class="auth auth-login">
         <div id="reg-heading">
             <h1>Student Login System</h1>
         </div>
         <?php if(function_exists(success_message())):?>
              <?php echo success_message();?>
        <?php elseif(function_exists(error_message())):?>
              <?php echo error_message()?>
        <?php endif;?>
        <?=form_open('students/login')?>
            <div>
                <input type="text" name="username" <?=set_value('username')?> placeholder="Username">
                <?='*'.form_error('username', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
                <?='*'.form_error('password', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <button class="btn btn-big btn-reg" type="submit">LOGIN</button>
            </div>
            <p>not yet a member? <a href="<?=site_url('register')?>">Register</a></p>
        </form>
     </div>
</body>
</html>
<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/header');?>
    <div class="img">
        <img src="<?=base_url('assets/images/profile.png')?>" alt="profile-img">
    </div>
     <div class="auth">
         <div id="reg-heading">
             <h1>Student Registration System</h1>
            
         </div>
       <?=form_open_multipart('students/register')?>
            <div>
                <input type="text" name="first_name" value="<?=set_value('firstname')?>" placeholder="First name">
                <?=form_error('first_name', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="text" name="surname" value="<?=set_value('surname')?>" placeholder="Surname">
                <?=form_error('surname', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="text" name="username" value="<?=set_value('username')?>" placeholder="Username">
                <?=form_error('username', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="email" name="email" value="<?=set_value('email')?>" placeholder="Email">
                <?=form_error('email', '<div style="color: red">', '</div>')?>
            </div>
            <label><strong>Upload Image</strong></label>
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <input type="tel" name="phone_no" value="<?=set_value('phone_no')?>" placeholder="Phone Number">
                <?=form_error('phone_no', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="date" name="date_of_birth" value="<?=set_value('date_of_birth')?>" placeholder="DOB">
                <?=form_error('date_of_birth', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <select name="gender" id="">
                <option value=""></option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
                <?=form_error('password', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="password" name="password-repeat" placeholder="Password-Repeat">
                <?=form_error('password-repeat', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <button class="btn btn-big btn-reg" type="submit">REGISTER</button>
            </div>
            <div>
                <p>already a member? <a href="<?=site_url('Login')?>">Login</a></p>
            </div>

        </form>
     </div>
</body>
</html>
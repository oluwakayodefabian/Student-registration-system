<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/header');?>
    <div class="img">
        <img src="<?=base_url('assets/images/profile.png')?>" alt="profile-img">
    </div>
     <div class="auth">
         <div id="reg-heading">
             <h1>Edit Info</h1>
         </div>
         <?php //if ($data_to_be_editted):?>
         <?php foreach ($data_to_be_editted as $data): ?>
         <?=form_open_multipart('students/update')?>
            <input type="hidden" name="id" value="<?=$data->id?>">
            <div>
                <input type="text" name="first_name" value="<?=$data->first_name?>" placeholder="First name">
                <?=form_error('first_name', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="text" name="surname" value="<?=$data->surname?>" placeholder="Surname">
                <?=form_error('surname', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="text" name="username" value="<?=$data->username?>" placeholder="Username">
                <?=form_error('username', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="email" name="email" value="<?=$data->email?>" placeholder="Email">
                <?=form_error('email', '<div style="color: red">', '</div>')?>
            </div>
            <label><strong>Upload Image</strong></label>
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <input type="tel" name="phone_no" value="<?=$data->phone_no?>" placeholder="Phone Number">
                <?=form_error('phone_no', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <input type="date" name="date_of_birth" value="<?=$data->date_of_birth?>" placeholder="DOB">
                <?=form_error('date_of_birth', '<div style="color: red">', '</div>')?>
            </div>
            <div>
                <select name="gender" id="">
                <option value=""></option>
                <?php if ($data->gender):?>
                    <option selected value="<?=$data->gender?>"><?=$data->gender?></option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                <?php endif;?>
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
                <button class="btn btn-big btn-reg" type="submit">EDIT</button>
            </div>
            <div>
                <p>already a member? <a href="<?=site_url('Login')?>">Login</a></p>
            </div>
        </form>
         <?php endforeach;?>
         <?php //endif;?>
     </div>
</body>
</html>
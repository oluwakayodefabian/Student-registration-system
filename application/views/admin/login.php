<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/adminHeader');?>
    <div class="img">
        <img src="<?=base_url('assets/images/profile.png')?>" alt="profile-img">
    </div>
     <div class="auth auth-login">
         <div id="reg-heading">
             <h1>Admin Login</h1>
         </div>
        <form action="">
            <div>
                <input type="text" name="" placeholder="Username">
            </div>
            <div>
                <input type="password" name="" placeholder="Password">
            </div>
            <div>
                <button class="btn btn-big btn-reg" type="submit">LOGIN</button>
            </div>
        </form>
     </div>
</body>
</html>
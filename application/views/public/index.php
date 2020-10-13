<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/header');?>
    <div id="page-wrapper">
    <?php if(function_exists(success_message())):?>
              <?php echo success_message();?>
      <?php elseif(function_exists(error_message())):?>
              <?php echo error_message()?>
      <?php endif;?>
        <div class="container">
            <p>welcome to home page</p>
        </div>
    </div>
<?php $this->load->view('templates/footer');?>
</html>
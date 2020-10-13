<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/adminHeader');?>
    <div id="admin-panel">
        <h3>Admin Panel</h3>
    </div>
    <div class="content">
        <h2 class="page-title">Manage Students</h2>
        <?php if(function_exists(success_message())):?>
              <?php echo success_message();?>
      <?php elseif(function_exists(error_message())):?>
              <?php echo error_message()?>
      <?php endif;?>
      <h3 class="search-title"><?=$title?></h3>
        <div class="search">
            <?=form_open('admin/dashboard')?>
                <input type="search" name="search" placeholder="Search...">
                <button class="search-btn" type="submit">search</button>
            </form>
        </div>
        <table>
            <thead>
                <th>SN</th>
                <th>profile-Img</th>
                <th>Username</th>
                <th>email</th>
                <th colspan='2'>Action</th>
            </thead>
            <tbody>
                <?php foreach ($students as $student):?>
                <tr>
                    <td><?=$student->id?></td>
                    <td><img src="<?=base_url('assets/images/').$student->image?>" alt="profile-img"></td>
                    <td><?=$student->username?></td>
                    <td><?=$student->email?></td>
                    <td><a href="<?=site_url('admin/dashboard/delete/').$student->id?>" class='delete'>Delete</a></td>
                    <?php if ($student->activated):?>
                    <td><a href="<?=site_url('admin/dashboard/activate')?>?activated=0&activate_id=<?=$student->id?>">de-activate</a></td>
                    <?php else:?>
                    <td><a href="<?=site_url('admin/dashboard/activate')?>?activated=1&activate_id=<?=$student->id?>">activate</a></td>
                    <?php endif;?>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>
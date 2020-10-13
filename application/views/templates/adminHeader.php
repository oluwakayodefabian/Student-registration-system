<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e1cab67604.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/styles.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin.css')?>">
</head>
<body>
    <header>
        <h1 id="logo-text"><a style="color: #fff;" href="<?=site_url('Home')?>">srs</a></h1>
        <ul class="nav-bar">
            <?php if (isset($_SESSION['id'])):?>
                <li><a href="<?=site_url('Home')?>">Home</a></li>
                
                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$_SESSION['username']?>&nbsp;<i class="fa fa-chevron-down" aria-hidden="true" style="font-size: 10px"></i></a>
                    <ul>
                        <?php if ($_SESSION['admin']):?>
                            <li><a href="<?=site_url('admin/dashboard')?>">Dashboard</a></li>
                        <?php endif;?>
                        <li><a href="<?=site_url('students/account')?>">Account</a></li>
                        <li><a href="<?=site_url('Logout')?>" class="logout">Logout</a></li>
                    </ul>
                </li>
            <?php else:?>
                <li><a href="<?=site_url('Register')?>"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Register</a></li>
                <li><a href="<?=site_url('Login')?>"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</a></li>
            <?php endif;?>
        </ul>
    </header>
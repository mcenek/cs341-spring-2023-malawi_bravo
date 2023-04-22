<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Sign In</title> 
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class = "container" >
        <div class = "row justify-content-center" style="margin-top:45px">
            <div class = "col-md-4 col-md-offset-4">
                <h4>Sign In</h4><hr>
                <form action="<?= base_url('auth/check')?>" method="post" autocompete="off">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <form>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign In</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                        <a href="<?= base_url('phpmyadmin') ?>">Direct Database Access</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

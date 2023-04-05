<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add a new class</title> 
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class = "container" >
        <div class = "row justify-content-center" style="margin-top:45px">
            <div class = "col-md-4 col-md-offset-4">
                <h4>Add a new student</h4><hr>
                <form action="<?= base_url("addClass/add") ?>" method="post" autocompete="off">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div class="form-group">
                        <label for="">Class Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= set_value("name"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "name") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Class ID</label>
                        <input type="text" class="form-control" name="password" placeholder="Class ID" value="<?= set_value("password"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "password") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Class</button>
                    </div>
                    <a href="<?= base_url("dashboard") ?>">Return to dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
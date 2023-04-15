<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add a new student</title> 
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class = "container" >
        <div class = "row justify-content-center" style="margin-top:45px">
            <div class = "col-md-4 col-md-offset-4">
                <h4>Add a new student</h4><hr>
                <form action="<?= base_url("addStudent/add") ?>" method="post" autocompete="off">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>
                <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= set_value("fname"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "fname") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?= set_value("lname"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "lname") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Student ID</label>
                        <input type="text" class="form-control" name="studentid" placeholder="Student ID" value="<?= set_value("studentid"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "studentid") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="text" class="form-control" name="dob" placeholder="Date of Birth (YYYY-MM-DD)" value="<?= set_value("dob"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "dob") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Name of Emergency Contact</label>
                        <input type="text" class="form-control" name="fcontact" placeholder="Name of Emergency Contact" value="<?= set_value("fcontact"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "fcontact") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Email of Emergency Contact</label>
                        <input type="text" class="form-control" name="faddress" placeholder="Email of Emergency Contact" value="<?= set_value("faddress"); ?>">
                        <span class ="text-danger"><?= isset($validation) ? display_error($validation, "faddress") : '' ?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Student</button>
                    </div>
                    <a href="<?= base_url("dashboard") ?>">Return to dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
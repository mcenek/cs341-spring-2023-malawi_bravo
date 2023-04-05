<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-12 col-md-8">
                <h4><?= $title; ?></h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucfirst($userInfo['name']); ?></td>
                            <td><?= $userInfo['email']; ?></td>
                            <td><a href="<?= site_url('auth/logout'); ?>">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex flex-column align-items-center mb-3">
                    <div class="w-100 mb-2">
                        <button type="button" class="btn btn-primary mb-2">Add Student</button>
                    </div>
                    <div class="w-100 mb-2">
                    <button type="button" class="btn btn-primary mb-2">Add Class</button>
                    </div>
                    <div class="w-100 mb-2">
                    <button type="button" class="btn btn-primary mb-2">Print Report Cards</button>
                    </div>
                    <div class="w-100 mb-2">
                    <a href="<?= site_url('search'); ?>">
                        <button type="button" class="btn btn-primary mx-2">Edit Grades</button>
                    </a>
                    </div>
                    <div class="w-100 mb-2">
                    <button type="button" class="btn btn-primary mb-2">Assign Students</button>
                    </div>
                </div>
                <table>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

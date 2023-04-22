<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-8">
                <h4 class="text-center">Edit Roster for <?="$className"?> (ID: <?="$classID"?>)</h4>
                <form action="<?= base_url('/assignClass/classSelected/search')?>" method="post" autocomplete="off">
                    <div class="d-flex justify-content-center mb-3">
                        <input type="text" id="query" name='query' class="form-control" placeholder="Search by Student Last Name">
                        <input type="hidden" name='className' value='<?=$className?>'>
                        <input type="hidden" name='classID' value='<?=$classID?>'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:45px">
                <table id="results">
                    <thead>
                        <?php if($result): ?>
                            <tr>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Enrolled</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php if($result): ?>
                            <?php foreach($result as $row) : ?>
                            <tr>
                                <?php $bool = in_array($row['StudentID'], $checked) ? 'checked' : ''; ?>
                                <td><?php echo "{$row['FirstName']} {$row['LastName']}"; ?></td>
                                <td><?php echo $row['StudentID']; ?></td>
                                <td><input type="checkbox" name="student" id="<?= $row['StudentID']?>" <?= $bool ?>></td>
                                
                                
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Save Changes to Roster</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 30px;">
                <a href="<?= base_url('dashboard') ?>">Return to dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>


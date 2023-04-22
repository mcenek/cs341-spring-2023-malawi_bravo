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
                <h4 class="text-center">Choose a class to edit</h4>
                <form action="<?= base_url('/assignStudents/search')?>" method="post" autocomplete="off">
                    <div class="d-flex justify-content-center mb-3">
                        <input type="text" id="query" name='query' class="form-control" placeholder="Search by Class Name">
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
                                <th>Class Name</th>
                                <th>Class ID</th>
                                <th>Track</th>
                                <th>Edit</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php if($result): ?>
                            <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?php echo "{$row['ClassName']}"; ?></td>
                                <td><?php echo $row['ClassID']; ?></td>
                                <td><?php echo $row['Track']; ?></td>
                                <form id="classid" action="<?= base_url('assignClass/classSelected')?>" method="post" autocomplete="off">
                                    <input type="hidden" name="className" value="<?= $row['ClassName']?>">
                                    <td><button  onclick="alert)" name="classID" value="<?= $row['ClassID']?>">Edit</button></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
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


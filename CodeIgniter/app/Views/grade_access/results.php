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
                <h4 class="text-center"><?php echo $className ?> </h4>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:45px">
                <table id="results">
                    <thead>
                        <?php if($result): ?>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Grade</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php if($result): ?>
                            <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?= $row['StudentID']; ?></td>
                                <td><?= $row['ClassID']; ?></td>
                                <td><?= $row['Grade']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
            <div class="d-flex flex-column align-items-center mb-3">
                <div class="w-100 mb-2">
		    <a href="<?= site_url('/editGrades/result/edit/'. $classId); ?>">
                        <button type="button" class="btn btn-primary mb-2">Edit</button>
                    </a>
                </div>
                <div class="w-100 mb-2">
                    <a href="<?= site_url('/editGrades'); ?>">
                        <button type="button" class="btn btn-primary mb-2">Back</button>
                    </a>
                </div>
            </div>
        </div>
</body>
</html>

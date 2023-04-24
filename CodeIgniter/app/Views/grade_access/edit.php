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
	<form action="<?=base_url('/editGrades/result/submit/'. $classId)?>" method="post">
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
				<td><input class="form-control" type="text" name="grade[]" placeholder="<?= $row['Grade']; ?>" value="<?= $row['Grade']; ?>"></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
            <div class="d-flex flex-column align-items-center mb-3">
                <div class="w-100 mb-2">
		            <button name="submit" value="<?= $classId?>" type="submit" class="btn btn-primary mb-2">Save Changes</button>
                </div>
                <div class="w-100 mb-2">
                    <a href="<?= site_url('/editGrades/result/'. $classId); ?>">
                        <button type="button" class="btn btn-primary mb-2">Cancel</button>
                    </a>
                </div>
	    </div>
	</form>
        </div>
</body>
</html>

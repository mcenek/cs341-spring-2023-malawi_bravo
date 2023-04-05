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
                <h4 class="text-center">EDIT GRADES</h4>
                <form action="<?= base_url('SearchController/search')?>" method="post" autocomplete="off">
                    <div class="d-flex justify-content-center mb-3">
                        <input type="text" id="query" name='query' class="form-control" placeholder="Search">
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
                                <th>Edit</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php if($result): ?>
                            <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?php echo $row['ClassName']; ?></td>
                                <td><?php echo $row['ClassID']; ?></td>
                                <td><button id="<?= $row['ClassID']?>">Edit</button></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
</body>
</html>
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
                <form action="#" method="get" autocomplete="off">
                    <div class="d-flex justify-content-center mb-3">
                        <input type="text" id="query" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </form>

                <table id="results">
                    <thead>

                    </thead>
                    <tbody>
                        <?php if($classes): ?>
                            <?php foreach($classes as $row) : ?>
                            <tr>
                                <td><?= $classes['ClassName']; ?></td>
                                <td><?= $classes['ClassID']; ?></td>
                                <td><button> </button></td>
                            </tr>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</body>
</html>
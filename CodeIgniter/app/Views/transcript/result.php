<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Transcript</title> 
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
    <style>
        .table-container {
            margin-top: 30px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
        #gradeReport {
            width: 100%;
            border-collapse: collapse;
        }
        #gradeReport th, #gradeReport td {
            border: 1px solid #999;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-6">
                <h4 class="text-center">Transcript</h4>
                <div class="table-container">
                    <h5>Student Name: <?= $studentName; ?></h5>
                    <h5>Student ID: <?= $studentId; ?></h5>

                    <table id="gradeReport">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Grade</th>
                                <th>Letter Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            function getLetterGrade($grade) {
                                if ($grade >= 90) return 'A';
                                if ($grade >= 80) return 'B';
                                if ($grade >= 70) return 'C';
                                if ($grade >= 60) return 'D';
                                return 'F';
                            }

                            foreach ($classes as $row)
                            {
                                ?><tr>
                                <td><?php echo $row['ClassName'];?></td>
                                <td><?php echo $row['Grade'];?></td>
                                <td><?php echo getLetterGrade($row['Grade']);?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button onclick="window.location.href='<?= base_url('dashboard') ?>'" class="btn btn-danger float-right mt-3" type="button" id="backButton">Back</button>
            </div>
        </div>
    </div>
</body>
</html>

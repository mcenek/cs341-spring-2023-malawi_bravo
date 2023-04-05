<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Home</title>
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
</head>
<body>
    <div class = "container">
        <div class = "row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h4><?= $title; ?></h4>
                <table class="table table-hover">
                    <thread>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thread>
                    <tbody>
                        <tr>
                            <td><?= ucfirst($userInfo['name']); ?></td>
                            <td><?= $userInfo['email']; ?></td>
                            <td><a href="<?= site_url('auth/logout'); ?>">Logout</td>
                        </tr>
		    </tbody>
		</table>
		<label class="input-group-text" for="searchByGroup">Select By<\label>
		<select class="form-select" id="searchByGroup"> 
			<option value="Name">Name</option>
			<option value="Class">Class</option>
		</select>		
            </div>
        </div>
    </div>  
</body>
</html>

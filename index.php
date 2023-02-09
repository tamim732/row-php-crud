<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Crud</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xxl-12">
                <h1 class="heading">CRUD</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            <ul class="list-group">
                <li class="list-group-item active">sidebar</li>
                <li class="list-group-item"><a href="index.php">All Students</a></li>
                <li class="list-group-item"><a href="add_student.php">Add Student</a></li>
                
            </ul>
            </div>
            <div class="col-8">
                <table class="table table-border">
                    <tr>
                        <th>SL:</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Roll</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tamim Islam</td>
                        <td>12</td>
                        <td>A</td>
                        <td>1</td>
                        <td>11 00 55 33</td>
                        <td>tamim@gmail.com</td>
                        <td>Bangladesh-Dhaka</td>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-success" type="button"><a href="" class="text-white">Edit</a></button>
                                <button class="btn btn-danger" type="button"><a href="" class="text-white">Delete</a></button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
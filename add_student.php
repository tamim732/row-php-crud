<?php
$con = mysqli_connect('localhost', 'root', '', 'sms');
if(!$con) {
    die('DB Not Connected'. mysqli_error($con));
    // echo 'connected';
}
?>

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
            <div class="col-8 mb-5">
        
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Class</label>
                    <select name="class" id="" class="form-control">
                        <option disabled>Select Class</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>                   
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Section</label>
                    <select name="section" id="" class="form-control">
                        <option disabled>Select Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>                   
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Roll</label>
                    <input type="number" class="form-control" name="roll">                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone">                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea name="address" class="form-control"></textarea>                    
                </div>
                <div>
                    <input type="submit" value="Add Student" name="submit" class="form-control btn btn-primary">
                </div>
            </form>
            <?php
            if(isset($_POST['submit'])) {
              $name = $_POST['name'];
              $class = $_POST['class'];
              $section = $_POST['section'];
              $roll = $_POST['roll'];
              $phone = $_POST['phone'];
              $email = $_POST['email'];
              $address = $_POST['address'];
                
                $query = "INSERT INTO stda_info VALUES(NULL, '$name', '$class', '$section', '$roll', '$phone', '$email', '$address')";
                $insert = mysqli_query($con, $query);
                if( $insert) {
                    echo 'Data Inserted Successfully';
                }
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
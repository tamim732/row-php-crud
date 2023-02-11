<?php
include('inc/db_connection.php');
include('inc/common.php');

$id = $_GET['id'];
$query = "SELECT * FROM stda_info WHERE id = $id";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
// print_r($data);
// die;

?>

            <div class="col-8 mb-5">
                <h4>Update Student Information</h4>
                <hr>
                <?php
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Class</label>
                    <select name="class" id="" class="form-control" required>
                        <option disabled selected>Select Class</option>
                        <option value="1" <?php if($data['class'] == 1) {echo 'selected';} ?>>1</option>
                        <option value="2" <?php if($data['class'] == 2) {echo 'selected';} ?>>2</option>
                        <option value="3" <?php if($data['class'] == 3) {echo 'selected';} ?>>3</option>
                        <option value="4" <?php if($data['class'] == 4) {echo 'selected';} ?>>4</option>
                        <option value="5" <?php if($data['class'] == 5) {echo 'selected';} ?>>5</option>
                        <option value="6" <?php if($data['class'] == 6) {echo 'selected';} ?>>6</option>
                        <option value="7" <?php if($data['class'] == 7) {echo 'selected';} ?>>7</option>
                        <option value="8" <?php if($data['class'] == 8) {echo 'selected';} ?>>8</option>
                        <option value="9" <?php if($data['class'] == 9) {echo 'selected';} ?>>9</option>
                        <option value="10" <?php if($data['class'] == 10) {echo 'selected';} ?>>10</option>
                    </select>                   
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Section</label>
                    <select name="section" id="" class="form-control" required>
                        <option disabled selected>Select Section</option>
                        <option value="A" <?php if($data['section'] == 'A') {echo 'selected';} ?>>A</option>
                        <option value="B" <?php if($data['section'] == 'B') {echo 'selected';} ?>>B</option>
                        <option value="C" <?php if($data['section'] == 'C') {echo 'selected';} ?>>C</option>
                    </select>                   
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Roll</label>
                    <input type="number" class="form-control" name="roll" value="<?php echo $data['roll']; ?>" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea name="address" class="form-control" required><?php echo $data['address']; ?></textarea>                    
                </div>
                <div>
                    <input type="submit" value="Update Informatin" name="submit" class="form-control btn btn-primary">
                </div>
            </form>
            <?php
            if(isset($_POST['submit'])) {
              $update_id = $data['id'];
              $name = $_POST['name'];
              $class = $_POST['class'];
              $section = $_POST['section'];
              $roll = $_POST['roll'];
              $phone = $_POST['phone'];
              $email = $_POST['email'];
              $address = $_POST['address'];
                
                $query = "UPDATE stda_info SET name = '$name', class = '$class', section = '$section', roll = '$roll',
                 phone = '$phone', email = '$email', `address` = '$address' WHERE id = $update_id ";
                $update = mysqli_query($con, $query);
                if( $update) {
                    $_SESSION['update'] = '<div class="alert alert-primary" role="alert">Data Updated Successfully</div>';
                    header('Location:view.php?id=' . $update_id);
                }else {
                    'Not Updated';
                }
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
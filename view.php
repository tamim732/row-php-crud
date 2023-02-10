<?php
include('inc/db_connection.php');
include('inc/common.php');

$id = $_GET['id'];
$query = "SELECT * FROM stda_info WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

?>
            <div class="col-8">
                <table class="table table-border">
                    <h3>Student Information</h3>
                    <hr>
                    <tr>
                        
                        <th>Name</th>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <td><?php echo $row['class']; ?></td>
                        </tr>
                        <tr>
                        <th>Section</th>
                        <td><?php echo $row['section']; ?></td>
                        </tr>
                        <tr>
                        <th>Roll</th>
                        <td><?php echo $row['roll']; ?></td>
                        </tr>
                        <tr>
                        <th>Phone</th>
                        <td><?php echo $row['phone']; ?></td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                        <th>Address</th>
                        <td><?php echo $row['address']; ?></td>                       
                    </tr>

                </table>
            </div>
        </div>
    </div>
</body>
</html>
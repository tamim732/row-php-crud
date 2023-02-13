<?php
include('inc/db_connection.php');

$id = $_GET['id'];
$query = "DELETE FROM stda_info WHERE id = $id ";
$delete = mysqli_query($con, $query);
if( $delete) {
    $_SESSION['delete'] = '<div class="alert alert-danger" role="alert">Data Deleted Successfully</div>';
    header('Location:index.php');
}else {
  echo 'Data Not Deeleted';
}

?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'img_crud') or die (mysqli_error());
$id= $_GET['id'];
$image_delete = $_GET['image_delete'];
$sql = "DELETE image FROM image WHERE id='$id'";
$query = mysqli_query($con,$sql);

if($query) {
    unlink('img/' . $image_delete);
    header('Location: index.php');
}else {
    echo 'Image Delete Failed';
}



?>
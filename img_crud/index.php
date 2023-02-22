<?php
$con = mysqli_connect('localhost', 'root', '', 'img_crud') or die (mysqli_error());


if(isset($_POST['submit'])){
   
$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];
$explo = explode('.', $name);
$lower_case = strtolower(end($explo));
$file_type = array('jpg','png');
$rename = date('Y') . '-' . rand(1,999) . '.' .$lower_case;

if(in_array( $lower_case,$file_type,$rename)){
    if( $size < 100000) {
        $upload = move_uploaded_file($tmp_name, 'img/' . $rename );
        if($upload) {
            $insert =  "INSERT INTO image (`image`) VALUES ('$rename')";
                mysqli_query($con, $insert);
            if($insert) {
                echo 'Image Stored successfully';
            }else {
                echo ' Not Stred';
            }
            
        
        }else{
            echo 'Image Upload Failed';
        }
    }else {
        echo ' Image size Must be Under the 100kbs';
    }
}else{
    echo 'Not Stored "File Must be jpg or png"';
}


}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];   ?>" method="POST" enctype="multipart/form-data">

<input type="file" name="image"><br>
<input type="submit" value="Upload" name="submit">
</form>
<br><br><br><br>
<?php
$sql = "SELECT * FROM image";
$result = mysqli_query($con, $sql);
echo '<table border="1">';
while( $row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img style="width: 200px; height: 200px;" src="img/<?php echo $row['image']; ?>" alt=""></td>
            <td><a href=""></a>Edit</td>
            <td><a href=""></a>Delete</td>
            
        </tr>
    <?php
}
echo '</table>';

?>
</body>
</html>
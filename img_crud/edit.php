<?php
$con = mysqli_connect('localhost', 'root', '', 'img_crud') or die (mysqli_error());

$id = $_GET['id'];
$sql = "SELECT * FROM image WHERE id = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
// print_r($row);

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
                $update =  "UPDATE image SET image ='$rename' WHERE id= ''$id";
                    mysqli_query($con, $update);
                if($update) {
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
    <title>Edit Image</title>
</head>
<body>
    <Form action="" method="POST" enctype="multipart/form-data">
    <img style="width: 200px; height: 200px;" src="img/<?php echo $row['image']; ?>" alt="">
    <input type="file" name="Update">
    <br><br><br>
    <input type="submit" value="Update" name="submit">
    </Form>
</body>
</html>



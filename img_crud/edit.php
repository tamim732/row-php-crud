<?php
$con = mysqli_connect('localhost', 'root', '', 'img_crud') or die(mysqli_error());

$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
// print_r($row);
$filePath = 'img/' . $row['image'];
// echo $filePath; die;
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_FILES['update']['name'];
    $tmp_name = $_FILES['update']['tmp_name'];
    $size = $_FILES['update']['size'];
    $explo = explode('.', $name);
    $lower_case = strtolower(end($explo));
    $file_type = array('jpg', 'png');
    $rename = date('Y') . '-' . rand(1000, 9999) . '.' . $lower_case;
    // echo $rename; die;
    if (in_array($lower_case, $file_type, $rename)) {
        if ($size < 100000) {
            if (file_exists($filePath)) 
            {
                unlink($filePath);
            }
            $upload = move_uploaded_file($tmp_name, 'img/' . $rename);
            // echo $upload; die;
            if ($upload) {
                $update =  "UPDATE `images` SET `image` = '$rename' WHERE `id` = '$id'";
                // echo $update; die;
                mysqli_query($con, $update);
                if ($update) {
                    echo 'Image Stored successfully';
                    header('location: index.php');
                } else {
                    echo ' Not Stred';
                }
            } else {
                echo 'Image Upload Failed';
            }
        } else {
            echo ' Image size Must be Under the 100kbs';
        }
    } else {
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
        <input type="file" name="update">
        <br><br><br>
        <input type="submit" value="Update" name="submit">
    </Form>
</body>

</html>





<!-- <?php
// $con = mysqli_connect('localhost', 'root', '', 'img_crud') or die (mysqli_error());

// $id = $_GET['id'];
// $sql = "SELECT * FROM images WHERE id = '$id'";
// $query = mysqli_query($con, $sql);
// $row = mysqli_fetch_assoc($query);
// print_r($row);

// if(isset($_POST['submit'])){

//     $id = $_GET['id'];
//     $name = $_FILES['Update']['name'];
//     $tmp_name = $_FILES['Update']['tmp_name'];
//     $size = $_FILES['Update']['size'];
//     $explo = explode('.', $name);
//     $lower_case = strtolower(end($explo));
//     $file_type = array('jpg','png');
//     $rename = date('Y') . '-' . rand(1,999) . '.' .$lower_case;
    
//     if(in_array( $lower_case,$file_type,$rename)){
//         if( $size < 100000) {
//             $update = move_uploaded_file($tmp_name, 'img/' . $rename );
//             if($update) {
//                 $update_img =  "UPDATE images SET image ='$rename' WHERE id= ''$id";
//                     mysqli_query($con, $update_img);
//                 if($update_img) {
//                     header('Location: index.php');
//                 }else {
//                     echo ' Not Stred';
//                 }
                
            
//             }else{
//                 echo 'Image Upload Failed';
//             }
//         }else {
//             echo ' Image size Must be Under the 100kbs';
//         }
//     }else{
//         echo 'Not Stored "File Must be jpg or png"';
//     }
    
    
//     }

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

 -->

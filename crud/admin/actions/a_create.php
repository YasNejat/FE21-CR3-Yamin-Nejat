<?php
require_once './db_connect.php';
require_once './file_upload.php';

if ($_POST) {   
    $aut_name = $_POST['aut_name'];
    $aut_lastname = $_POST['aut_lastname'];
    $title = $_POST['title'];
    $ISBN = $_POST['ISBN'];
    $description = $_POST['description'];
    $pub_name = $_POST['pub_name'];
    $pub_address = $_POST['pub_address'];
    $pub_date = $_POST['pub_date'];
    $pub_size = $_POST['pub_size'];
    $book_type = $_POST['book_type'];
    $status = $_POST['status'];
    
   
     
    $uploadError = '';
    //this function exists in the service file upload.
    $image = file_upload($_FILES['image']);  
   
    $sql = "INSERT INTO products (aut_name,aut_lastname,title,ISBN,description,pub_name,pub_address,pub_date,pub_size,book_type,status,image) VALUES ('$aut_name','$aut_lastname','$title','$ISBN','$description','$pub_name','$pub_address',$pub_date,'$pub_size','$book_type','$status','$image->fileName')";

    if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $aut_name </td>
            <td> $aut_lastname </td>
            <td> $title </td>
            <td> $ISBN </td>
            <td> $description </td>
            <td> $pub_name</td>
            <td> $pub_address </td>
            <td> $pub_date </td>
            <td> $pub_size </td>
            <td> $book_type </td>
            <td> $status</td>
           
           
        
            </tr></table><hr>";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>
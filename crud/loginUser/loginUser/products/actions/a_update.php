<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

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
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $image= file_upload($_FILES['image']);//file_upload() called  
    if($image->error===0){
        ($_POST["image"]=="product.png")?: unlink("../../pictures/$_POST[image]");           
        $sql = "UPDATE products SET aut_name = '$aut_name', aut_lastname = '$aut_lastname', image = '$image->fileName' , title= '$title',ISBN ='$ISBN' , description ='$description',book_type='$book_type' WHERE id = {$id}";
    }else{
        $sql = "UPDATE products SET aut_name = '$aut_name', aut_lastname = '$aut_lastname' WHERE id = {$id}";
    }    
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
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
        <?php require_once '../../../../components/boot.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>
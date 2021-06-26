<?php
require_once './actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        
        $aut_name = $data['aut_name'];
        $aut_lastname = $data['aut_lastname'];
        $title = $data['title'];
        $ISBN = $data['ISBN'];
        $description = $data['description'];
        $pub_name = $data['pub_name'];
        $pub_address = $data['pub_address'];
        $pub_date = $data['pub_date'];
        $pub_size = $data['pub_size'];
        $book_type = $data['book_type'];
        $status = $data['status'];
        $image = $data['image'];
        
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <?php require_once '../../../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $image?>' alt="<?php echo $aut_name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                       <th>Author Name</th>
                        <td><input  class ='form-control' type="text"  name="aut_name"  placeholder ="Author  Name" value="<?php echo $aut_name?>" /></td>
                   </tr>   
                   <tr>
                       <th>Author Last Name</th>
                        <td><input  class ='form-control' type="text"  name="aut_lastname"  placeholder ="Author Last Name" value="<?php echo $aut_lastname ?>" /></td>
                   </tr>   
                   <tr>
                       <th>title</th>
                        <td><input  class ='form-control' type="text"  name="title"  placeholder ="title" value="<?php echo $title ?>"  /></td>
                   </tr>   
                   <tr>
                       <th>ISBN code</th>
                        <td><input  class ='form-control' type="text"  name="ISBN"  placeholder ="ISBN code" value="<?php echo $ISBN ?>"/></td>
                   </tr>   
                   <tr>
                       <th>Description</th>
                        <td><input  class ='form-control' type="text"  name="description"  placeholder ="Description" value="<?php echo $description ?>" /></td>
                   </tr>   
                   <tr>
                       <th>Publish Name</th>
                        <td><input  class ='form-control' type="text"  name="pub_name"  placeholder ="Publish name" value="<?php echo $pub_name ?>" /></td>
                   </tr>   
                   <tr>
                       <th>Publish address</th>
                        <td><input  class ='form-control' type="text"  name="pub_address"  placeholder ="Publish address" value="<?php echo $pub_address ?>" /></td>
                   </tr>   
                   <tr>
                       <th>Publish date</th>
                        <td><input  class ='form-control' type="date"  name="pub_date"  placeholder ="Publish date" value="<?php echo $pub_date ?>" /></td>
                   </tr>   
                   <tr>
                       <th>Publish size</th>
                        <td><input  class ='form-control' type="text"  name="pub_size"  placeholder ="Publish size" value="<?php echo $pub_size?>" /></td>
                   </tr>   
                   <tr>
                       <th>Book type</th>
                        <td><input  class ='form-control' type="text"  name="book_type"  placeholder ="Book type" value="<?php echo $book_type?>"/></td>
                   </tr>   
                   <tr>
                       <th>Status</th >
                       <td><input class= 'form-control' type="text"  name= "status" placeholder ="Status" value="<?php echo $status ?>" /></ td>
                   </tr>
                   <tr>
                       <th>Image</th >
                       <td><input class= 'form-control' type="file"  name="image" value="<?php echo $image ?>"/></ td>
                   </tr>
                   <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                        <input type= "hidden" name= "image" value= "<?php echo $data['image'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>
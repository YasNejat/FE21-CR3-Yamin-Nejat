<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php'?>
    <title>PHP CRUD / Add Product</title>
    <style>
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }      
       </style>
</head>
<body>
<fieldset>
           <legend class='h2'> Add  Media</legend>
           <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Author Name</th>
                        <td><input  class ='form-control' type="text"  name="aut_name"  placeholder ="Author  Name" /></td>
                   </tr>   
                   <tr>
                       <th>Author Last Name</th>
                        <td><input  class ='form-control' type="text"  name="aut_lastname"  placeholder ="Author Last Name" /></td>
                   </tr>   
                   <tr>
                       <th>title</th>
                        <td><input  class ='form-control' type="text"  name="title"  placeholder ="title" /></td>
                   </tr>   
                   <tr>
                       <th>ISBN code</th>
                        <td><input  class ='form-control' type="text"  name="ISBN"  placeholder ="ISBN code" /></td>
                   </tr>   
                   <tr>
                       <th>Description</th>
                        <td><input  class ='form-control' type="text"  name="description"  placeholder ="Description" /></td>
                   </tr>   
                   <tr>
                       <th>Publish Name</th>
                        <td><input  class ='form-control' type="text"  name="pub_name"  placeholder ="Publish name" /></td>
                   </tr>   
                   <tr>
                       <th>Publish address</th>
                        <td><input  class ='form-control' type="text"  name="pub_address"  placeholder ="Publish address" /></td>
                   </tr>   
                   <tr>
                       <th>Publish date</th>
                        <td><input  class ='form-control' type="date"  name="pub_date"  placeholder ="Publish date" /></td>
                   </tr>   
                   <tr>
                       <th>Publish size</th>
                        <td><input  class ='form-control' type="text"  name="pub_size"  placeholder ="Publish size" /></td>
                   </tr>   
                   <tr>
                       <th>Book type</th>
                        <td><input  class ='form-control' type="text"  name="book_type"  placeholder ="Book type" /></td>
                   </tr>   
                   <tr>
                       <th>Status</th >
                       <td><input class= 'form-control' type="text"  name= "status" placeholder ="Status"/></ td>
                   </tr>
                   <tr>
                       <th>Image</th >
                       <td><input class= 'form-control' type="file"  name="image" /></ td>
                   </tr>
                   <tr>
                       <td><button class ='btn btn-success' type= "submit">Insert Product</button></td>
                       <td><a href="index.php" ><button class= 'btn btn-warning' type= "button">Home</ button></a></ td>
                   </tr>
               </table>
           </form>
       </fieldset>
</body>
</html>
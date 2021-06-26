
<?php require_once './actions/db_connect.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows ($result)  > 0) {    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
       $tbody .= "<tr>

            <td><img class='img-thumbnail' src='../pictures/" .$row['image']."'</td>
           <td>" .$row['aut_name']."</td>
            <td>" .$row['aut_lastname']."</td>
            <td>" .$row['title']."</td>
            <td>" .$row['ISBN']."</td>
            <td>" .$row['description']."</td>
            <td>" .$row['pub_name']."</td>
            <td>" .$row['pub_address']."</td>
            <td>" .$row['pub_date']."</td>
            <td>" .$row['pub_size']."</td>
            <td>" .$row['book_type']."</td>
            <td>" .$row['status']."</td>
            
           <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-warning btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>

            </tr>";
   };
} else {
   $tbody =  "<tr><td class='table-warning' p-5 colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../../../components/boot.php' ?>
    <style type= "text/css">
           .manageProduct {          
               margin: auto;
           }
           .img-thumbnail {
               width: 70px !important;
                height: 70px !important;
              
           }
           .h2{
               color:#af182c;
               font-family: serif!important;
               display: inline;
            border-bottom: 3px solid #f9dd94;
           }
           .h5{
               color:#af182c;
               font-family: serif;
   
              
           }
           .owntitle{
             color:white;
             display: inline;
            border-bottom: 3px solid #f9dd94;
               font-family: serif;
           }
           td {          
               text-align: left;
               vertical-align: middle;
           }
           tr {
               text-align: center;
               color: black!important;
              
           }
         
           img{
             height:300px;
            
             
           }
           .h3{
            text-align: center;
               color: yellow!important;
               /* background-color: #f9dd94; */
               font-family: serif;
         
           }

           a{
                color: black!important;
           }
           p{
            text-align: center;
           }
       
.container img{

  object-fit: cover;
  background-size: cover;
     background-repeat: no-repeat;
   
           }

           body{
            background-color:gray;
         
           }
            
       </style>
</head>

<body>
              
         
 <div class="manageProduct w-75 mt-3">   
            <table class='table table-striped'>
               <thead>
                   <tr>

                        <th>Image</th>
                       <th>Author Name </th>
                       <th>Author Last Name</th>
                        <th>Title</th>
                        <th>ISBN code</th>
                        <th>Description</th>
                        <th>Publish Name</th>
                        <th>Publish address</th>
                        <th>Publish date</th>
                        <th>Publish size</th>
                        <th>Book type</th>
                        <th>Status</th>
                        <th>Image</th>
                   </tr>
               </thead>
               <tbody>
               <?= $tbody;?>
               </tbody>
            </table>

             <div style=margin:100px; class='mb-3'>
 <a href= "create.php" ><button class='btn btn-warning'type = "button" >Add Book</button></a>
 <a href= "" ><button class='btn btn-warning'type = "button" >Home</button></a>
 </div>
</div>  
</body>
</html>
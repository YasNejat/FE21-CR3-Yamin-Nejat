<?php
session_start();
require_once '../../components/db_connect.php';

    // if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);





$sql = "SELECT * FROM `reserv` as table1 INNER join products as table2 on table1.fk_product_id = table2.id where table1.fk_user_id =".$_SESSION['user'];

$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows ($result)  > 0) {    
    while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
       $tbody .= "<tr>

            <td><img class='img-thumbnail' src='./pictures/" .$row1['image']."'</td>
           <td>" .$row1['aut_name']."</td>
            <td>" .$row1['aut_lastname']."</td>
            <td>" .$row1['title']."</td>
            <td>" .$row1['ISBN']."</td>
            <td>" .$row1['description']."</td>
            <td>" .$row1['pub_name']."</td>
            <td>" .$row1['pub_address']."</td>
            <td>" .$row1['pub_date']."</td>
            <td>" .$row1['pub_size']."</td>
            <td>" .$row1['book_type']."</td>
            <td>" .$row1['status']."</td>
            
           
          <td> <a href='delete.php?id=" .$row1['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome - <?php echo $row['first_name']; ?></title>
        <?php require_once '../../components/boot.php'?>
        <style>
            .userImage{
                width: 200px;
                height: 200px;
            }
            .hero {
                background: rgb(2,0,36);
                background: linear-gradient(24deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 100%);   
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="hero">
                <img class="userImage" src="./pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
                <p class="text-white" >Hi <?php echo $row['first_name']; ?></p>
            </div>
            <a href="logout.php?logout">Sign Out</a>
            <a href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
        </div>
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
    </body>
</html>
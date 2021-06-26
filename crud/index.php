<?php require_once './admin/actions/db_connect.php';
session_start();
$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
$cards = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $cards .= "

       <div class='col'>
       <div class='card m-5'>
       
         <div class='card-body text-center'>
         <p><img class='card-img-top' src='./loginUser/loginUser/pictures/" . $row['image'] . "'</p>
         <h5>" . $row['aut_name'] . "</h5>
           <h2 class='card-title'> " . $row['title'] . "</h2>
           <p> " . $row['description'] . "</p>
            <p style=color:red;>" . $row['status'] . "</p> 
            <p>" . $row['book_type'] . "</p>
            <form method='post' enctype= 'multipart/form-data'>
            <input type='hidden' name='product_id' value='" . $row['id'] . "'/>
            <input type='submit' name='add_to_cart' style='margin-top:5px'class='btn btn-success' value='Add to Cart' />
            </form>
         </div>
       </div>
     </div>";
  };
}


if ($_POST) {



  if (!isset($_SESSION['user'])) {
    header("Location:loginUser/loginUser/index.php");
    exit;
  }

  $product_id = $_POST['product_id'];
  $userId = $_SESSION['user'];
  $sql = "INSERT INTO reserv (fk_user_id,fk_product_id) VALUES ($userId,$product_id)";
  // echo $sql;
  $result1 = mysqli_query($connect, $sql);
  $connect->close();
}
?>









<?php require_once 'components/boot.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>PHP CRUD</title>

  <style type="text/css">
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css");

    nav {
      font-size: 1.3rem;
      width: 100%;
      z-index: 1000000;
      top: 0px;
      position: sticky !important;

    }

    li {
      position: relative;
      padding: 15px 0;
    }

    a {
      color: #fff;
      text-transform: uppercase;
      text-decoration: none;
      letter-spacing: 0.15em;
      display: inline-block;
      padding: 15px 20px;
      position: relative;
      font-size: 23px;
      font-family: serif;
    }




    .bi {
      font-size: 30px;
      color: yellow;
    }

    .manageProduct {
      margin: auto;
    }

    .img-thumbnail {
      width: 70px !important;
      height: 70px !important;

    }

    .h2 {
      color: #af182c;
      font-family: serif !important;
      display: inline;
      border-bottom: 3px solid #f9dd94;
    }

    .h5 {
      color: #af182c;
      font-family: serif;
      border-bottom: 3px solid #f9dd94;
      font-size: 30px;
    }

    .owntitle {
      color: white;
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
      color: black !important;

    }

    img {
      height: 300px;


    }

    .h3 {
      text-align: center;
      color: yellow !important;
      /* background-color: #f9dd94; */
      font-family: serif;

    }

    a {
      color: black !important;

    }

    .ownfooter {
      text-align: center !important;
      color: white !important;
      text-align: center;
      font-family: serif;

    }

    h2,
    h5 {
      color: #f9dd94 !important;
    }

    p {
      text-align: center;
      color: white;
    }

    .container img {

      object-fit: cover;
      background-size: cover;
      background-repeat: no-repeat;

    }

    .card {
      background-color: #2e3033 !important;
    }

    body {
      background-color: gray;

    }
  </style>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-book"></i></a>
        <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #fa2742 !important" href="memmbership.html" tabindex="-1">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./loginUser/loginUser/index.php" tabindex="-1" aria-disabled="true"><i class="bi bi-cart"></i> </a>

            </li>

          </ul>
     
        </div>
      </div>
    </nav>
  </div>


  <div class="container blurred">

    <div class="card bg-dark text-white">
      <img src="https://images.pexels.com/photos/1296000/pexels-photo-1296000.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="card-img" alt="...">
      <div class="card-img-overlay">


        <p class='h3 mt-5'>The Wonderful<br>World of Reading</p>
        <p class="card-text m-5">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>




  <div class="container mt-5 ">
    <p>
    <h5 class="card-title  owntitle">Upcoming Events </h5>
    </p>
    <div class="row">
      <div class="col-sm-12 col-lg-6">
        <img src="https://images.pexels.com/photos/771313/pexels-photo-771313.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="card-img" alt="...">

      </div>
      <div class="col">
        <h5 class="card-title"></h5>
        <p class='h2'>New Little Engine written by Christopher Awdry</p>
        <p class="card-text m-5">New Little Engine - is an addition story to the railway series in which we meet the narrow gauge engine Ivo Hugh, the new recruit to the Thin Controller's Little Railway.

          It is baby story time at the Book4You Library. Come to us with your children and enjoy the reading with other families.</p>


      </div>
    </div>
    <div class="container">
      <p>
      <h5 class="card-title  owntitle">New Materials</h5>
      </p>

      <div class="row row-cols-1 row-cols-md-3 g-1">



        <!-- dynamic cards -->
        <?= $cards; ?>
      </div>
    </div>
    <!-- Table for test -->
    <tr>


    </tr>
    <!-- <div class="row">
    <div class="col">
      1 of 3
    </div> -->
    <div class="col p-5">


      <p class='h5 mt-5'>The library is a place for everyone to explore, discover, and engage</p>
    </div>
    <div class="col">
      <div class="col">
        <img src="https://images.pexels.com/photos/6282071/pexels-photo-6282071.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="card-img" alt="...">
        <p class="card-text m-5">New Little Engine - is an addition story to the railway series in which we meet the narrow gauge engine Ivo Hugh, the new recruit to the Thin Controller's Little Railway.

          It is baby story time at the Book4You Library. Come to us with your children and enjoy the reading with other families.</p>

      </div>
    </div>
  </div>
  </div>




  <div class="container">
    <p>
    <h5 class="card-title  owntitle">New Materials</h5>
    </p>

    <div class="row row-cols-1 row-cols-md-3 g-1">

      <!-- dynamic cards -->
      <?= $cards; ?>
    </div>
  </div>


  <!-- Footer -->
  <div class="container pt-5">

    <nav class="navbar navbar-light bg-dark ownFooter">
      <div class="container-fluid">
        <p class="navbar-brand bg_drak" href="#">
        <div class="navbar-brand ownfooter" href="#">Book4you<br>Library <i class="bi bi-book"></i> </div>
        </p>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
<html>


</body>

</html>
<?php require_once 'components/boot.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">


  <title>Navbar</title>
</head>

<body>
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
  </style>


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
              <a class="nav-link" style="color: #fa2742 !important" href="./loginUser/loginUser/index.php" tabindex="-1">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./loginUser/loginUser/index.php" tabindex="-1" aria-disabled="true"><i class="bi bi-cart"></i> </a>

            </li>

          </ul>
         
        </div>
      </div>
    </nav>
  </div>


  <!-- Bootstrap Js - CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
<html>
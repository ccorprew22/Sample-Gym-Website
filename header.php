<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Workout Header">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <!---
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="style.css">

</head>
<body>
   <header>

     <nav class="navbar navbar-expand-md navbar-dark bg-primary justify-content-between fixed-top">
       <a class="navbar-brand" href="index.php">
           <img src="https://w0.pngwave.com/png/369/574/computer-icons-fitness-centre-exercise-dumbbell-png-clip-art.png" width="30" height="30" class="d-inline-block align-top" alt="">
           <span class="menu-collapsed">Chris's Gym</span>
       </a>
       <div class="collapse navbar-collapse">
       <ul class="navbar-nav">
           <li class="nav-item active">
               <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item active">
               <a class="nav-link" href="#">Trainers</a>
           </li>



  <?php
  if(isset($_SESSION['userId'])){
    echo '<li class="nav-item active">
        <a class="nav-link" href="clientIndex.php">My Account</a>
    </li>
    </ul>
  </div>'

    ;
  }else{
    echo '
    <li class="nav-item active">
    <a class="nav-link active" href="signup.php">Signup</a>
    </li>
    <br>
    </ul>
  </div>
    <form class="form-inline" action="includes/login.inc.php" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Username/Email" name="mailuid" aria-label="Search">
      <input class="form-control mr-sm-2" type="password" placeholder="Password" name="pwd" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" type="submit" name="login-submit">Login</button>
    </form>
    ';
  }
   ?>
   <div>
     <?php
     if(isset($_SESSION['userId'])){
       echo '<form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="post">
         <button type="submit" class="btn btn-light" name="logout-submit">Logout</button>
       </form>';
     }
      ?>
   </div>
</nav>
   </header>
</body>

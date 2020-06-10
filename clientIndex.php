<?php
 require "header.php";

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

<div class="row" id="body-row">
  <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
      <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
      <!-- Bootstrap List Group -->
      <ul class="list-group sticky-top sticky-offset">
        <a href="clientRoutines.php" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                  <span class="fa fa-tasks fa-fw mr-3"></span>
                  <span class="menu-collapsed">Routines</span>
              </div>
        </a>
        <a href="clientUpdate.php" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                  <span class="fa fa-tasks fa-fw mr-3"></span>
                  <span class="menu-collapsed">Update Profile</span>
              </div>
        </a>
        <a href="#" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                  <span class="fa fa-tasks fa-fw mr-3"></span>
                  <span class="menu-collapsed">Payment Information</span>
              </div>
        </a>
      </ul>
      <!-- List Group END-->
  </div>
    <div class="col py-3">

      <?php
      require 'dbh.inc.php';
      $f=null;
      $l=null;

      if(isset($_SESSION['first'])){
        $f = $_SESSION['first'];
      }
      if(isset($_SESSION['last'])){
        $l = $_SESSION['last'];
      }
      echo "<h1>Hello ".$f." ".$l."</h1>";

      ?>
    </div>

</div>

<?php
 require "footer.php";
?>

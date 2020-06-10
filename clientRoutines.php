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

<!-- Bootstrap row -->
<body>
<div class="row" id="body-row">
    <!-- Sidebar -->
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
    <!-- sidebar-container END -->
    <div class="col py-3">

      <h1 class="center">Routines</h1>


      <?php
      require 'dbh.inc.php';

      $sql = "SELECT *
              FROM `Clients` C, `ExerciseRoutine` ER, `Exercise` E2, `ExercisePlan` E
              WHERE C.idUsers = E.idUsers AND E.RoutineId = ER.RoutineId AND ER.ExerciseID = E2.ExerciseID;";

      $res1 = mysqli_query($conn, $sql);
      $resCheck = mysqli_num_rows($res1);

      if($resCheck > 0){
        $inc = 1;
        $check = 0;
        $r = 0;
        while($row = mysqli_fetch_assoc($res1)){
          if($check == 0){
            echo "<table class='table'><thead><tr><th>Routine ".$inc."</th></tr></thead>";
            echo"<thead class='thead-light'><tr><th>Exercise</th><th>Description</th></tr></thead>";
            echo "<tr><td>".$row["Name"]."</td><td>".$row["Descrip"]."</td>";
            $inc++;
            $check=1;
            $r = $row["RoutineId"];
          }elseif ($row["RoutineId"] == $r){
            echo "<tr><td>".$row["Name"]."</td><td>".$row["Descrip"]."</td>";
          }else{
            $check=0;
            $r=0;
            echo "</table>";
          }
        }
      }else{
        echo "0 result";
      }
      ?>
    </table>
    </div>

</div>
</body>
<?php
 require "footer.php";
?>

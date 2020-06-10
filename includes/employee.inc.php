<?php

if(isset($_POST['login-submit2'])) {
  require 'dbh.inc.php';

  $mailtid = $_POST['mailtid'];
  $password = $_POST['pwdt'];

  if (empty($mailtid) || empty($password)){
    header("Location: ../employeeIndex.php?error=emptyfields");
    exit();
  }else{
    $sql = "SELECT * FROM `Trainers` WHERE tidTrainers=? OR emailTrainers=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../employeeIndex?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $mailtid, $mailtid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row= mysqli_fetch_assoc($result)){
        $pwdtCheck = password_verify($password, $row['pwdTrainers']);
        if($pwdtCheck == false){
          header("Location: ../employeeIndex.php?error=wrongpwd");
          exit();
        }else if($pwdtCheck == true){
          session_start();
          $_SESSION['trainerId']= $row['tid'];
          $_SESSION['trainerTid']= $row['tidTrainers'];
          header("Location: ../employeeIndex.php?login=success");
          exit();
        }else{
          header("Location: ../employeeIndex.php?error=wrongpwd");
          exit();
        }
      }
    }
  }

}else{
  header("Location: ../employeeIndex.php");
  exit();
}

 ?>

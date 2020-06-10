<?php
  if(isset($_POST['update-email'])){
    require 'dbh.inc.php';
    session_start();
    $email = $_POST['email'];
    $user = null;

    if(empty($email)){
      header("Location: ../clientUpdate.php?error=emptyfields");
      exit();
    }else{
      if(isset($_SESSION['userId'])){
        $user = $_SESSION['userId'];
      }

      $sql="UPDATE `Clients` SET emailUsers = ? WHERE idUsers = ?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../clientUpdate.php?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "si", $email, $user);
        mysqli_stmt_execute($stmt);
        header("Location: ../clientUpdate.php?update=successful");
        exit();
      }
    }
  }else if(isset($_POST['update-pwd'])){
    require 'dbh.inc.php';
    session_start();
    $pass = $_POST['pass'];
    $passRepeat = $_POST['pass-repeat'];
    $user = null;
    if(empty($pass) || empty($passRepeat)){
      header("Location: ../clientUpdate.php?error=emptyfields");
      exit();
    }else{
      if(isset($_SESSION['userId'])){
        $user = $_SESSION['userId'];
      }
      if($pass == $passRepeat){
        $sql="UPDATE `Clients` SET pwdUsers = ? WHERE idUsers = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../clientUpdate.php?error=sqlerror");
          exit();
        }else{
          $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "si", $hashedPwd, $user);
          mysqli_stmt_execute($stmt);
          header("Location: ../clientUpdate.php?pwdchange=successful");
          exit();
        }
      }else{
        header("Location: ../clientUpdate.php?error=pwdmismatch");
        exit();
      }
    }
  }else{
    header("Location: ../clientUpdate.php");
    exit();
  }

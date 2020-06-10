 <?php
  if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $first = $_POST['fname'];
    $last = $_POST['l'];
    $gender = $_POST['sex'];
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];


    if(empty($first) || empty($last) || empty($gender) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
      header("Location: ../signup.php?error=emptyfields");
      exit();
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidmail&uid");
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../signup.php?error=invalidemail&uid=".$username);
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: ../signup.php?error=invalidpwd&mail=".$email);
    }else if($password !== $passwordRepeat){
      header("Location: ../signup.php?error=pwdmismatchuid=".$username."&mail=".$email);
    }else{

      $sql = "SELECT uidUsers FROM `Clients` WHERE uidUsers=?";
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=sqlerror");
        exit();
      }else {
         mysqli_stmt_bind_param($stmt, "s", $username);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if($resultCheck > 0){
           header("Location: ../signup.php?error=usertaken&mail=".$email);
           exit();
         }else{
           $sql = "INSERT INTO `Clients` (fname, lname, sex, uidUsers, emailUsers, pwdUsers) VALUES (?,?,?,?,?,?)";
           $stmt = mysqli_stmt_init($conn);
           if(!mysqli_stmt_prepare($stmt, $sql)){
             header("Location: ../signup.php?error=sqlerror");
             exit();
           }else{
              $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $gender, $username, $email, $hashedPwd);
              mysqli_stmt_execute($stmt);
              header("Location: ../signup.php?signup=successful");
              exit();
           }
         }
       }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


  }else{
    header("Location: ../signup.php");
    exit();
  }

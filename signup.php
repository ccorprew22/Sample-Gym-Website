<?php
 require "header.php";
?>

<main>
  <div class="wrapper-main" style="text-align:center">

    <section class="section-default">
      <h1 class="center" style="padding: 20px;">Signup</h1>
      <?php
      if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
          echo '<p class="signuperror">Fill in all fields!</p>';
        }else if($_GET['error'] == 'usertaken'){
          echo '<p class="signuperror">Username is already taken!</p>';
        }else if ($_GET["signup"] == 'success'){
          echo '<p class="signupsuccess">Signup successful!</p>';
        }

      }
       ?>
  <form action="includes/signup.inc.php" method="post">
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label>First Name</label>
      <input type="text" class="form-control"  name="fname" placeholder="First Name">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label>Last Name</label>
      <input type="text" class="form-control"  name="l" placeholder="Last Name">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label>Gender</label>
      <select class="form-control" name="sex">
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Other</option>
      </select>
    </div>
  </div>

  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label>Username</label>
      <input type="text" class="form-control" name="uid" placeholder="Username">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label >Email address</label>
      <input type="email" class="form-control" name="mail" placeholder="name@example.com">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label >Password</label>
      <input type="password" class="form-control"  name="pwd" placeholder="Enter Password">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
      <label >Type Password Again</label>
      <input type="password" class="form-control" name="pwd-repeat">
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3 w-50">
        <button class="btn btn-primary" type="submit" name="signup-submit">Signup</button>
    </div>
  </div>
</form>

</main>

<?php
 require "footer.php";
?>

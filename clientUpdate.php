<?php
 require "header.php";

?>

<!-- Bootstrap row -->
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

      <h1>Update Profile</h1>

      <form action="includes/update.inc.php" class="form-signup"  method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">New Email Address</label>
          <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter new email">
        </div>
        <button type="submit" class="btn btn-primary" name="update-email">Change Email</button><br>
        <br>
      </form>

      <form class="form-signup" action="includes/update.inc.php" method="post">
        <div class="form-group">
          <label for="exampleInputPassword1">New Password</label>
          <input type="password" class="form-control" id="exampleInputPassword" name="pass" placeholder="Enter new password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Enter New Password Again</label>
          <input type="password" class="form-control" id="exampleInputPassword" name="pass-repeat" placeholder="Enter Password Again">
        </div>
        <button type="submit" class="btn btn-primary" name="update-pwd">Change Password</button>
      </form>
    </div>

</div>

<?php
 require "footer.php";
?>

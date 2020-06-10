<?php
 require "header.php";
?>

<main>
  <div class="wrapper-main" style="text-align:center">
    <section class="section-default">
      <h1 class="center">Employee Login</h1>
      <form class="form-signup" action="includes/employee.inc.php" method="post">
        <div class="form-group">
          <input type="text" name="mailtid" placeholder="Username/Email">
        </div>
        <div class="form-group">
          <input type="password" name="pwdt" placeholder="Password">
        </div>
        <button type="submit" name="login-submit2">Login</button>
      </form>
    </section>
  </div>

</main>

<?php
 require "footer.php";
?>

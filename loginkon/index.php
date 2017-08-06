<?php
  session_start();
  include('../includes/config.php');
  include('../includes/db.php');

  if(isset($_POST['btnLogin']))
  {
    $username = mysqli_real_escape_string($db, $_POST['txtName']);
    $password = mysqli_real_escape_string($db, $_POST['txtPassword']);

    if($username == "liniolon" && $password=="amir")
    {
      $_SESSION['username'] = "liniolon";
      header("Location:../admin/index.php");
      exit();
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <form action="" method="post" name="frmLogin">
      <input type="text" name="txtName"   placeholder="Username"/>
      <input type="password" name="txtPassword" placeholder="Password" />
      <input type="submit" value="Login" name="btnLogin" />
    </form>
  </body>
</html>

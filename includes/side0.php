<?php
include_once("config.php");
include_once("db.php");

if(isset($_POST['btnSearch']))
{
  $search = mysqli_real_escape_string($db, $_POST['txtSearch']);
  $query = "SELECT * FROM tbl_posts WHERE p_post = '$search'";
  $data = $db->query($query);
  $row = mysqli_fetch_assoc($data);

  $id = $row['p_id'];

  header("Location: search.php?id=".$id);
  exit();


}
?>

<div class="col-sm-3 sidenav">
  <h4 class="text-center">وب‌لاگ امیر کوهکن</h4>
  <ul class="nav nav-pills nav-stacked">
      <li class="active">
        <a href="index.php">خانه <span class="glyphicon glyphicon-home"></span></a>
      </li>
      <li>
        <a href="archive.php">آرشیو <span class="glyphicon glyphicon-list-alt"></span></a>
      </li>
      <li>
        <a href="links.php">لینک‌دونی <span class="glyphicon glyphicon-link"></span></a>
      </li>

      <li>
        <a href="about.php">درباره من <span class="glyphicon glyphicon-user"></span></a>
      </li>
      <li>
      <a href="contact.php">تماس با من <span class="glyphicon glyphicon-phone"></span></a>
      </li>

      <form action="" method="post" name="frmSearch" role="form">
        <div class="input-group">
          <input type="text" name="txtSearch" class="form-control" placeholder="جستجو "  />
          <div class="input-group-btn">
            <button class="btn btn-default" name="btnSearch" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </div>
        </div>
      </form>
  </ul>
</div>

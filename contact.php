<?php

  include('includes/config.php');
  include('includes/db.php');

  if(isset($_POST['btnSend']))
  {
    $name = mysqli_real_escape_string($db, $_POST['txtName']);
    $email = mysqli_real_escape_string($db, $_POST['txtEmail']);
    $text = mysqli_real_escape_string($db, $_POST['txtText']);

    $query = "INSERT INTO tbl_contact (c_name, c_email, c_text) VALUES ('$name', '$email', '$text')";
    $db->query($query);


  }
?>
<!DOCTYPE html>
<html lang="fa">
  <head>
    <title>وب‌لاگ امیر کوهکن</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1"  />
    <meta name="author" content="امیر کوهکن"  />
    <meta name="description" content="وب‌سایت شخصی امیر کوهکن"  />
    <meta name="keyword" content="" />

    <!-- Use CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/css.css" />

    <!-- Using JQuery -->
    <script src="js/jquery.js"></script>

    <!-- Use JS -->
    <script src="js/bootstrap.js" ></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row content text-right">
        <?php
          include('includes/side0.php');
        ?>

        <div style="margin-top: 50px;" class="col-sm-9">
            <div class="text-center">
              <h4>تماس با من</h4>
            </div>
          <form action="" method="post" name="frmContact" class="form-horizontal" role="form">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" name="txtName" class="form-control" placeholder="نام و نام‌خانوادگی" required  />
              </div>
              <div class="form-group">
                <input type="email" name="txtEmail" class="form-control" placeholder="پست الکترونیکی" required  />
              </div>
              <div class="form-group">
                <textarea class="form-control" name="txtText" rows="4" placeholder="متن پیام" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="btnSend" class="btn btn-primary btn-block" value="ارسال پیام"  />
              </div>
            </div>
            <div class="col-sm-1">

            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
      include('includes/footer.php');
    ?>
  </body>
</html>

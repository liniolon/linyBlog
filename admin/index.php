<?php
  session_start();

  include('../includes/config.php');
  include('../includes/db.php');

  if(!isset($_SESSION['username']) )
  {
    header("Location:../index.php?error=" . urlencode("شما نمیتوانید وارد شوید"));
    exit();
  }

  if(isset($_POST['btnSend']))
  {
    $subject = mysqli_real_escape_string($db, $_POST['txtSubject']);
    $post = mysqli_real_escape_string($db, $_POST['txtPost']);
    $keyword = mysqli_real_escape_string($db, $_POST['txtKeyword']);
    $username = "Amir Kouhkan";

    $query = "INSERT INTO tbl_posts(p_subject, p_post, p_user, p_keyword) VALUES ('$subject', '$post', '$username' ,'$keyword' )";
    $db->query($query);
    header("Location:index.php?success=" . urlencode("مطلب شما با موفقیت ارسال شد"));
    exit();

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
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/css.css" />

    <!-- Using JQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Use JS -->
    <script src="../js/bootstrap.js" ></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row content text-right">
        <?php
          include('../includes/side.php');
        ?>

        <div class="col-sm-9 right">


          <form class="form-horizontal" role="form" action="" method="post" name="frmPost" style="padding-top: 70px;">

              <?php
                if(isset($_GET['success']))
                {
                  echo'<div class="alert alert-success">' . $_GET['success'] .'</div>';
                }
              ?>
            <div class="form-group">
              <label for="subject" class="col-sm-3">عنوان مطلب</label>
              <div class="col-sm-9">
                <input type="text" name="txtSubject" class="form-control" placeholder="عنوان مطلب" required="عنوان مطلب را وارد کنید" id="subject" />
              </div>
            </div>
            <div class="form-group">
              <label for="text" class="col-sm-3">متن مطلب</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="text" rows="8" required="متن مطلب را وارد کنید" name="txtPost" placeholder="متن مطلب"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="keyword" class="col-sm-3">کلمات کلیدی</label>
              <div class="col-sm-9">
                <input type="text" name="txtKeyword" class="form-control" placeholder="کلمات کلیدی را با - از هم جدا کنید" required="کلمات کلیدی را اضافه کنید" id="keyword" />
              </div>
            </div>
            <div class="form-group">
              <label for="posted" class="col-sm-3"></label>
              <div class="col-sm-9">
                <button class="btn btn-success btn-block" name="btnSend">ارسال مطلب</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </body>
</html>

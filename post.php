<?php
  include('includes/config.php');
  include('includes/db.php');


  if(isset($_POST['btnComment']))
  {

    $comment = mysqli_real_escape_string($db, $_POST['txtComment']);
    $user = mysqli_real_escape_string($db, $_POST['txtUser']);
    $email = mysqli_real_escape_string($db, $_POST['txtEmail']);
    $post_id= $_GET['p_id'];

    $query = "INSERT INTO tbl_comments (c_post_id, c_comment_text, c_user, c_email) VALUES ('$post_id', '$comment', '$user', '$email')";
    mysqli_query($db, $query);
    header("Location:post.php");
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
        <div class="col-sm-9 right">
          <?php
            if(isset($_GET['p_id']))
            {
              $query = "SELECT * FROM tbl_posts WHERE p_id=".$_GET['p_id'];
              $get_data = $db->query($query);
              if($row = mysqli_fetch_assoc($get_data))
              {
                echo '
                <h4><small>نوشته‌ی جدید</small></h4>
                <hr />
                <h2>'.$row['p_subject'].'</h2>
                <h5><span class="glyphicon glyphicon-time"></span> ارسال شده توسط '.$row['p_user'].' در زمان '.$row['p_date'].'</h5>
                <h5><span class="label label-danger">Keyword one</span> <span class="label label-primary">Keyword one</span></h5>
                <br />
                <p>
                  '.$row['p_post'].'
                </p>
                <br />
                <a href="post.php?p_id='.$row['p_id'].'" class="btn btn-warning btn-sm">ادامه نوشته</a>
                <br />
                <br />
                <br />
                ';
              }


            }
            else {
              header("Location:index.php");
            }

          ?>

          <!-- Comment area -->
          <h4>نظر شما درباره این نوشته؟</h4>
          <form role="form" class="form-horizontal" name="frmComment" action="" method="post">
            <div class="form-group">
              <div class="col-sm-6">
                  <input type="email" name="txtEmail" placeholder="پست الکترونیکی" class="form-control" />
              </div>
              <div class="col-sm-6">
                <input type="text" name="txtUser" placeholder="نام و نام‌خانوادگی" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="txtComment" rows="3" required></textarea>
            </div>
            <button type="submit" name="btnComment" class="btn btn-success btn-block">ارسال</button>
          </form>
          <br />
          <br />
          <p>نظرات</p><br />
          <?php
            $query = "SELECT * FROM `tbl_comments` WHERE c_post_id=".$_GET['p_id'];
            $comments = $db->query($query);
            //$rowsa = mysqli_fetch_assoc($comments);
            foreach($comments as $rows)
            {
              echo
              '
              <div class="row">
                <div class="col-sm-2 text-center">
                <!--  <img src="" class="img-circle" height="65" width="65" alt="Aavatar" /> -->
                </div>
                <div class="col-sm-10">
                  <h4>'.$rows['c_user'].' <small>'.$rows['c_date'].'</small></h4>
                  <p>
                    '.$rows['c_comment_text'].'
                  </p>
                </div>
              </div>
              ';
            }

          ?>
        </div>
      </div>
    </div>
    <?php
      include('includes/footer.php');
    ?>
  </body>
</html>

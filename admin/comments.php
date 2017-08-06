<?php
  session_start();

  include('../includes/config.php');
  include('../includes/db.php');

  if(!isset($_SESSION['username']) )
  {
    header("Location:../index.php?error=" . urlencode("شما نمیتوانید وارد شوید"));
    exit();
  }

  if(isset($_GET['del']))
  {
    $query = "DELETE FROM tbl_comments WHERE c_id = ".$_GET['del'];
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
          <table class="table">
            <thead>
              <tr>
                <td>
                  شماره مطلب
                </td>
                <td>
                  نام و نام‌خانوادگی
                </td>
                <td>
                  پست الکترونیکی
                </td>
                <td>
                  متن کامنت
                </td>
                <td>
                  حذف
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM tbl_comments";
                $data = $db->query($query);
                while($row = mysqli_fetch_assoc($data))
                {
                  echo '
                    <tr>
                      <td>
                        '.$row['c_post_id'].'
                      </td>
                      <td>
                        '.$row['c_user'].'
                      </td>
                      <td>
                        '.$row['c_email'].'
                      </td>
                      <td>
                        '.$row['c_comment_text'].'
                      </td>
                      <td>
                        <a href="comments.php?del='.$row['c_id'].'" class="btn btn-danger">حذف</a>
                      </td>
                    </tr>

                  ';

                }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
  session_start();

  include('../includes/config.php');
  include('../includes/db.php');

  if(!isset($_SESSION['username']) )
  {
    header("Location:../index.php?error=" . urlencode("شما نمیتوانید وارد شوید"));
    exit();
  }

  if(isset($_GET['del_id']))
  {
    $query = "DELETE FROM tbl_posts WHERE p_id = ".$_GET['del_id'];
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
          <table class="table table-striped" style="margin-top: 50px;">
            <thead>
              <tr>
                <td>
                  شماره ردیف
                </td>
                <td>
                  عنوان مطلب
                </td>
                <td>
                تاریخ ارسال
                </td>
                <td>
                حذف
                </td>
                <td>
                  ویرایش
                </td>
              </tr>
            </thead>
            <tbody>

              <?php
                $post = "SELECT * FROM tbl_posts";
                $data = $db->query($post);
                while($row = mysqli_fetch_assoc($data))
                {
                  echo '
                  <tr>


                  <td>
                    '.$row['p_id'].'
                  </td>
                  <td>
                    '.$row['p_subject'].'
                  </td>
                  <td>
                    '.$row['p_date'].'
                  </td>
                  <td>
                    <a href="posts.php?del_id='.$row['p_id'].'" class="btn btn-danger">حذف</a>
                  </td>
                  <td>
                  <a href="edit.php?up_id='.$row['p_id'].'" class="btn btn-warning">ویرایش</a>
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

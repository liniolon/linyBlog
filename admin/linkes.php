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
    $delte = "DELETE FROM tbl_links WHERE l_id =".$_GET['del'];
    $db->query($delte);
  }
  if(isset($_POST['btnSave']))
  {
    $link = mysqli_real_escape_string($db, $_POST['txtLink']);
    $com = mysqli_real_escape_string($db, $_POST['txtComment']);

    $insert = "INSERT INTO tbl_links (l_link, l_comment) VALUES ('$link', '$com')";
    $db->query($insert);
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
          <div class="col-sm-5" style="margin-top: 50px;">
            <form action="" method="post" class="form-horizontal" role="form">
              <div class="form-group">
                <input type="text" name="txtLink" class="form-control" placeholder="Link" required  />
              </div>
              <div class="form-group">
                <input type="text" name="txtComment" class="form-control" placeholder="Comment" required  />
              </div>
              <div class="form-group">
                <button name="btnSave" class="btn btn-primary btn-block" >ثبت لینک</button>
              </div>
            </div>

            <div class="col-sm-7" style="margin-top: 50px;">
              <table class="table table-striped" >
                <thead>
                  <tr>
                    <td>
                      شماره ردیف
                    </td>
                    <td>
                      آدرس لینک
                    </td>
                    <td>
                      توضیحات لینک
                    </td>
                    <td>
                      حذف
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM tbl_links";
                    $data = $db->query($query);
                    while($row = mysqli_fetch_assoc($data))
                    {
                      echo '
                      <tr>
                      <td>
                        '.$row['l_id'].'
                      </td>
                      <td>
                      '.$row['l_link'].'
                      </td>
                      <td>
                      '.$row['l_comment'].'
                      </td>
                      <td>
                      <a href="linkes.php?del='.$row['l_id'].'" class="btn btn-danger">حذف</a>
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
      </div>
    </div>
  </body>
</html>

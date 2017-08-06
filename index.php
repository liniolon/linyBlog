<?php
  include('includes/config.php');
  include('includes/db.php');


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
            $query = "SELECT * FROM tbl_posts ORDER BY p_id DESC";
            $get_data = $db->query($query);

            foreach($get_data as $row)
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

          ?>
        </div>
      </div>
    </div>
    <?php
      include('includes/footer.php');
    ?>
  </body>
</html>

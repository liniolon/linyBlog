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
          <table class="table">
            <thead>
              <tr>
                <td>
                  عنوان مطلب
                </td>
                <td>
                  دیدن مطلب
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM tbl_posts ORDER BY p_id DESC";
                $data = $db->query($query);

                while($row = mysqli_fetch_assoc($data))
                {
                  echo '
                    <tr>
                      <td>
                          '.$row['p_subject'].'
                      </td>
                      <td>
                        <a href="post.php?p_id='.$row['p_id'].'" class="btn btn-default">ببین</a>
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
    <?php
      include('includes/footer.php');
    ?>
  </body>
</html>

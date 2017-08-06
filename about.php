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
            <h3>درباره‌ی من ؟</h3>
            <img src="imgs/me.jpg" class="img img-circle half" alt="OwnPicture" />
            <h4>برنامه‌نویس و علاقه‌مند به سیستم‌عامل گنو</h4>
          </div>

          <br /><br />
          <p class="text-right" style="direction: rtl;" >
              سلام. من امیر کوهکن، دانشجوی سال دوم مهندسی کامپیوتر هستم:) <br />
          </p>
          <br /><br />
          <ul style="direction: rtl;">
            حوزه های مورد علاقه‌ی من به شرح زیر هست
            <li>
              Website <b>Back-end</b> Development -> <b>PHP</b> and <b>Python</b>
            </li>
            <li>
              Game <b>2D</b> Development -> <b>PyGame</b>
            </li>
            <li>
              Restful API -> <b>Flask</b>
            </li>
            <li>
              Operating System -> <b>Gnu/linux</b>
            </li>
          </ul>

          <p>
            هدف من از ساختن این وب‌لاگ به اشتراک گذاری اطلاعاتم برای افرادی که به تازگی به دنیای گنو/لینوکس قدم گذاشتن :) و میخوان از این دنیا،

            لذت کافی رو ببرن اما مشکلات متعددی که براشون پیش میاد این لذت رو یکمی تلخ‌تر کرده (که البته آدم تا اشتباه نکنه یاد نمیگیره)
          </p>
          <p>
            این وب‌لاگ توسط خودم نوشته شده و ازاونجا که طراحی وب‌سایت نمیکنم ظاهر سایت خیلی ساده طراحی شده اگر دوست داشتین در رفع باگ این وب‌لاگ کمک کنید کد های وب‌لاگ در <a href="https://github.com/liniolon/linyBlog" class="btn btn-default btn-xs" >اینجا</a> قابل دیدن هست
          </p>
          <p>
            اگر قصد همکاری با من داشتید در قسمت <a href="contact.php" class="btn btn-default btn-xs"><b>تماس با من</b></a> با موضوع همکاری پیامی رو برای من بفرستید
          </p>
          <p style="direction: rtl;">
            اگر دوست داشتید در نگه‌داری این وب‌لاگ سهیم باشید میتونید از طریق لینک <a href="https://zarinp.al/liniolon" class="btn btn-default btn-xs" >زرین‌پال</a> مبلغی رو به عنوان Donate برای من واریز کنید :)
          </p>
        </div>
      </div>
    </div>
    <?php
      include('includes/footer.php');
    ?>
  </body>
</html>

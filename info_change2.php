<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>変更完了｜Be:Be network</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>

<body>
    <!-- start navigation -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="index.html" class="brand">
                    <img src="images/logo.png" width="120" height="40" alt="Logo" />
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li><a href="#home">入力</a></li>
                        <li class="active"><a href="#portfolio">変更完了</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End navigation -->

    <!-- kanryo start hotani -->
    <div id="portfolio" class="section primary-section">
        <div class="container">
            <div class="title">
                <h1>プロフィール変更完了！</h1>
            </div>
            <div class="centered">
              <?php

                        session_start();
        $mail = $_SESSION["mail_address"];

      //  var_dump($_SESSION);
      //  var_dump($_POST);
      //  var_dump($mail);

        $connect = mysql_connect ("mysql707a.xserver.jp", "japangoods_bebe", "bebe30");
        mysql_query("SET NAMES utf8", $connect);

        $nickname = $_POST["nickname"];
        $goal = $_POST["goal"];
        $height = $_POST["height"];
        $weight_new = $_POST["weight_new"];
        $lifestyle = $_POST["lifestyle"];
        $eating = $_POST["eating"];
        $comment = $_POST["comment"];

        mysql_db_query("japangoods_bebenetwork",
                      "UPDATE user_tbl SET nickname = '$nickname', goal= '$goal', height= '$height',
                      weight_new = '$weight_new', lifestyle = '$lifestyle', eating = '$eating',
                      comment= '$comment' WHERE mail = '$mail' ");

                  mysql_close($connect);

                  echo "<p>以下の通り、プロフィールを変更しました！</p>";
                  echo "ニックネーム: ";
                  echo "$nickname<br>";
                  echo "目標体重: ";
                  echo "$goal";
                  echo "kg<br>";                  
                  echo "現在の身長: ";
                  echo "$height";
                  echo "cm<br>";
                  echo "現在の体重: ";
                  echo "$weight_new";
                  echo "kg<br>";
                  echo "生活リズム: ";
                  echo "$lifestyle<br>";
                  echo "食生活: ";
                  echo "$eating<br>";
                  echo "自己紹介: ";
                  echo "$comment<br>";

                ?>
                <br><br>
                <a href="mypage.php" class="button" >マイページへ</a>
                <br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
    <!-- kanryo end hotani -->

    <!-- Footer section start -->
    <div class="footer">
        <p><a href="logout.html" style="color:white">ログアウト</a></p>
        <p><a href="allbattle.html" style="color:white">ダイエットバトル</a></p>
        <p><a href="mybattle.html" style="color:white">あなたが参加中のバトル</a></p>
        <p><a href="mypage.php" style="color:white">マイページ</a></p>
        <p>&copy; 2015 Be:Be network &amp; c-connect</p>
    </div>
    <!-- Footer section end -->
    <!-- ScrollUp button start -->
    <div class="scrollup">
        <a href="#">
            <i class="icon-up-open"></i>
        </a>
    </div>
    <!-- ScrollUp button end -->
    <!-- Include javascript -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <!-- Load google maps api and call initializeMap function defined in app.js -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
    <!-- css3-mediaqueries.js for IE8 or older -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/app.js"></script>

</body>
</html>
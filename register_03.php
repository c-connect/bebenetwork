<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>登録完了｜Be:Be network</title>
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
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>

<body>

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="index.html" class="brand">
                    <img src="images/logo.png" width="120" height="40" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-tarPOST=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li><a href="#home">入力</a></li>
                        <li><a href="#service">確認画面</a></li>
                        <li class="active"><a href="#portfolio">完了☆</a></li>
<!--                            <li><a href="#about">about</a></li>
                        <li><a href="#clients">Clients</a></li>
                        <li><a href="#price">price</a></li>
                        <li><a href="#contact">Point</a></li>
-->                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>

    <!-- kanryo start hotani -->
    <div id="portfolio" class="section primary-section">
        <div class="container">
            <div class="title">
                <h1>完了☆</h1>
            </div>
            <div class="centered">
              <?php
                
                  echo "<p>登録が完了いたしました！</p>";

                  $name = $_POST['name'];
                  $furigana = $_POST['furigana'];
                  $nickname = $_POST['nickname'];
                  $sex = $_POST['sex'];
                  $weight = $_POST['weight'];
                  $height = $_POST['height'];
                  $mail = $_POST['mail_address'];
                  $pw = $_POST['password'];

                var_dump($_POST);

                    $connect = mysql_connect ("mysql707a.xserver.jp", "japangoods_bebe", "bebe30");
                  mysql_query("SET NAMES utf8", $connect); 
                  /*   $sql = "INSERT INTO user_tbl (name, name_f, nickname, sex_flg, height, weight, mail, pass, datetime_join )
                                VALUES ('$name', '$furigana', '$nickname', '$sex','$height', '$weight', '$mail_address', '$password', sysdate() )";
                    
                    mysql_query ($sql,$connect);

                    mysql_close($connect);*/

                   mysql_db_query("japangoods_bebenetwork",
                      "INSERT user_tbl (name, name_f, nickname, sex_flg, height, weight, mail, pass, datetime_join )
                                VALUES ('$name', '$furigana', '$nickname', '$sex',
                                        '$height', '$weight', '$mail', '$pw', sysdate() )");
                  mysql_close($connect);

                    session_start(); /*セッションがここからはじまるよ 必須！*/
  
                    $_SESSION["mail_address"] = $mail;
                    $_SESSION["password"] = $pw;
                  
                  /* session_destroy(); */
                  /*
                  session_start(); /*セッションがここからはじまるよ 必須！*/
                  /*
                  $mail = $_SESSION["mail_address"];
                  $pw = $_SESSION["password"];
                  
                  var_dump($_SESSION);

                  session_destroy();*/

                ?>
            </div>
        </div>
    </div>
    <div id="register" class="section primary-section">
        <div class="container">
            <div class="centered">
                <a href="mypage.php" class="button" >マイページへ</a>
            </div>
        </div>
    </div>
    <!-- kanryo end hotani -->

        <!-- Footer section start -->
        <div class="footer">
            <p><a href="index.html" style="color:white">HOME</a></p>
<!--        <p><a href="allbattle.html" style="color:white">ダイエットバトル</a></p> -->
<!--        <p><a href="course.html" style="color:white">バナナダイエット</a></p> --> 
<!--        <p><a href="mybattle.html" style="color:white">あなたが参加中のバトル</a></p> -->
<!--        <p><a href="mypage.html" style="color:white">マイページ</a></p> -->
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
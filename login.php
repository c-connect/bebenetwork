<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ログイン完了｜Be:Be network</title>
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
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li><a href="#home">ログイン</a></li>
                            <li class="active"><a href="#service">ログイン完了</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End navigation -->
        <!-- start login check -->
        <div id="price" class="section primary-section">
            <div class="container">
                <div class="title">
                    <h1>ログイン確認</h1>
                </div>
                <div class="centered">
                    
                    <?php

                        $mail = $_POST["mail_address"];
                        $pw = $_POST["password"];

                        session_start();
                        session_destroy();

                        $connect = mysql_connect ("mysql707a.xserver.jp", "japangoods_bebe", "bebe30");
                        mysql_query("SET NAMES utf8", $connect);

                        $result=mysql_db_query("japangoods_bebenetwork",
                           "SELECT * from user_tbl where mail = '$mail' ");

                        while(true){
                           $kekka = mysql_fetch_assoc($result); 

                              if ($kekka == null) {
                                break;
                                }else{
                                   $i++;

                                       $UserInfo[$i]["nickname"] = $kekka['nickname'];
                                       $UserInfo[$i]["height"] = $kekka['height'];
                                       $UserInfo[$i]["mail"] = $kekka["mail"];
                                       $UserInfo[$i]["weight_new"] = $kekka["weight_new"];
                                       $UserInfo[$i]["pass"] = $kekka["pass"];
                              }
                        }


                    //start. by hotani

                    if( (!empty($mail)) && (!empty($pw)) && ($UserInfo[1]["mail"] == $mail) && ($UserInfo[1]["pass"] == $pw)){

                          session_start(); /*セッションがここからはじまるよ*/
                          $_SESSION['mail_address'] = $mail;
                          $_SESSION['password'] = $pw;

                          echo "<br><p>";
                          echo "ようこそ、";
                          echo $UserInfo[$i]["nickname"];
                          echo "さん！</p><br>";
                          echo "<a href='mypage.php' class='button'>マイページへ</a>";
                          echo "<br><br><br><br><br><br><br><br><br><br><br>";
                        }else if(($mail == null) || ($pw == null)){
                          echo "<p>未入力の項目があります。</p>";
                          echo "<p>IDとパスワードをご確認の上、もう一度ご入力ください。</p><br><br>";
                          echo "<a href='login.html' class='button'>ログイン画面へもどる</a>";
                          echo "<br><br><br><br><br><br><br><br><br>";
                        }else{
                          echo "<p>IDとパスワードが一致しません。</p>";
                          echo "<p>ご確認の上、もう一度ご入力ください。</p><br><br>";
                          echo "<a href='login.html' class='button'>ログイン画面へもどる</a>";
                          echo "<br><br><br><br><br><br><br><br><br>";
                        }

                    //end.by hotani 

                      mysql_close($connect);

                    ?>

                </div>
            </div>
        </div>
        <!-- login end hotani ohkawa -->
        <!-- Footer section start -->
        <div class="footer">
            <p><a href="index.html" style="color:white">HOME</a></p>
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
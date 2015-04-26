<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>登録確認｜Be:Be network</title>
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
                        <li><a href="#home">入力</a></li>
                        <li class="active"><a href="#service">確認画面</a></li>
                        <li><a href="#portfolio">完了☆</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End navigation -->

    <!-- kakunin start hotani -->
    <div id="service" class="section primary-section">
            <div class="container">
                <div class="title">
                    <h1>登録確認画面</h1>
                </div>
                <div class="centered">
                    <form action="register_03.php" name="register02" method="POST">
                      <!--データベースに情報が追加されないように適当なphpをしています。
                      実際にはregister_3.phpに飛ぶように設定するよ。-->
                    <?php
//test.start by hotani

                      $name = $_POST['name'];
                      $furigana = $_POST['furigana'];
                      $nickname = $_POST['nickname'];
                      $sex = $_POST['sex'];
                      $weight = $_POST['weight'];
                      $height = $_POST['height'];
                      $mail_address = $_POST['mail_address'];
                      $password = $_POST['password'];
                      $password2 = $_POST['password2'];

                      $connect = mysql_connect ("mysql707a.xserver.jp", "japangoods_bebe", "bebe30");
                      mysql_query("SET NAMES utf8", $connect);


                     // var_dump($mail_address);
                      $result = mysql_db_query("japangoods_bebenetwork","SELECT * FROM user_tbl WHERE  mail = '$mail_address' ");


                   //   while(true){
                            $kekka = mysql_fetch_assoc($result); 

                          //  if ($kekka == null) {

                           //   break;
                          //  }else{
                        //    echo "<p>既に使われれているメールアドレスです。</p>";
                                       //   echo "<p>ご確認の上、もう一度ご入力ください。</p><br><br>";
                                       //   echo "<a href='reg.html' class='button'>入力画面へもどる</a>";
                                       //   echo "<br><br><br><br><br><br><br><br><br>";


                  if( (!empty($name)) && (!empty($furigana)) && (!empty($nickname))  //&& (!empty($sex))
                      && (!empty($weight)) && (!empty($height)) && (!empty($mail_address)) && (!empty($password))
                      && (!empty($password2)) && ($password == $password2) && ($mail_address!=$kekka['mail'])
                      ){ 

                      echo "<p>氏名：$name</p>";
                      echo "<p>氏名カナ：$furigana</p>";
                      echo "<p>ニックネーム：$nickname</p>";

                      if ($sex==0) {
                        echo "<p>性別：女性</p>";
                      } elseif ($sex==1) {
                        echo "<p>性別：男性</p>";
                      } else {
                        echo "<p>性別：その他</p>";
                      }

                      echo "<p>身長：$height";
                      echo "cm</p>";
                      echo "<p>体重：$weight";
                      echo "kg</p>";
                      echo "<p>メールアドレス：$mail_address</p>";
                      echo "<p>パスワード：お客様の設定されたパスワード</p>";

                      echo "<p>上記の内容で登録いたします。</p>";
                      echo "<p>よろしければ確認ボタンを押してください。</p>";

                      echo "<input type='hidden' name='name' value='$name'>";
                      echo "<input type='hidden' name='furigana' value='$furigana'>";
                      echo "<input type='hidden' name='nickname' value='$nickname'>";
                      echo "<input type='hidden' name='sex' value='$sex'>";
                      echo "<input type='hidden' name='weight' value='$weight'>";
                      echo "<input type='hidden' name='height' value='$height'>";
                      echo "<input type='hidden' name='mail_address' value='$mail_address'>";
                      echo "<input type='hidden' name='password' value='$password'>";
                      echo "<a href='Javascript:void(0);' class='button' onclick='document.register02.submit();'>登録</a>";

                    }elseif((!empty($name)) && (!empty($furigana)) && (!empty($nickname))  //&& (!empty($sex))
                      && (!empty($weight)) && (!empty($height)) && (!empty($mail_address)) && (!empty($password))
                      && (!empty($password2)) && ($password == $password2) && ($kekka["mail"]==$mail_address)
                      ){
                      echo "<p>既に使われれているメールアドレスです。</p>";
                      echo "<p>他のメールアドレスでのご登録をお願いします。</p><br><br>";
                      echo "<a href='register_01.html' class='button'>入力画面へもどる</a>";

                    }else{
                     echo "<p>未入力の項目がある、もしくは確認パスワードが一致していません。</p>";
                     echo "<p>ご確認の上、もう一度ご入力ください。</p><br><br>";
                     echo "<a href='register_01.html' class='button'>入力画面へもどる</a>";
                     echo "<br><br><br><br><br><br><br><br><br>";
                   }



// test.end by hotani
                   /*
                      $name = $_POST['name'];
                      $furigana = $_POST['furigana'];
                      $nickname = $_POST['nickname'];
                      $sex = $_POST['sex'];
                      $weight = $_POST['weight'];
                      $height = $_POST['height'];
                      $mail_address = $_POST['mail_address'];
                      $password = $_POST['password'];

                      echo "<p>氏名：$name</p>";
                      echo "<p>氏名カナ：$furigana</p>";
                      echo "<p>ニックネーム：$nickname</p>";

                      if ($sex==0) {
                        echo "<p>性別：女性</p>";
                      } elseif ($sex==1) {
                        echo "<p>性別：男性</p>";
                      } else {
                        echo "<p>性別：その他</p>";
                      }
                      echo "<p>身長：$height";
                      echo "cm</p>";
                      echo "<p>体重：$weight";
                      echo "kg</p>";
                      echo "<p>メールアドレス：$mail_address</p>";
                      echo "<p>パスワード：お客様の設定されたパスワード</p>";

                      echo "<p>上記の内容で登録いたします。</p>";
                      echo "<p>よろしければ確認ボタンを押してください。</p>";

                      echo "<input type='hidden' name='name' value='$name'>";
                      echo "<input type='hidden' name='furigana' value='$furigana'>";
                      echo "<input type='hidden' name='nickname' value='$nickname'>";
                      echo "<input type='hidden' name='sex' value='$sex'>";
                      echo "<input type='hidden' name='weight' value='$weight'>";
                      echo "<input type='hidden' name='height' value='$height'>";
                      echo "<input type='hidden' name='mail_address' value='$mail_address'>";
                      echo "<input type='hidden' name='password' value='$password'>"; */

                    ?>
                    <br><br>
                <!--    <a href='Javascript:void(0);' class='button' onclick="document.register02.submit();">登録</a> -->
                    </form>
                </div>
          </div>
      </div>
        <!-- kakunin end hotani -->

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


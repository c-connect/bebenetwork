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
        <title>マイページ｜Be:Be network</title>
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
        <?php
    
        session_start();
        $mail = $_SESSION["mail_address"];
      /*  var_dump($_SESSION);
        var_dump($mail);*/
        $connect = mysql_connect ("mysql707a.xserver.jp", "japangoods_bebe", "bebe30");
        mysql_query("SET NAMES utf8", $connect);
        $result=mysql_db_query("japangoods_bebenetwork",
        "SELECT * from user_tbl where mail = '$mail' ");
  
       /* var_dump($result);*/
        mysql_close($connect);
        $row = mysql_fetch_assoc($result);

        ?>
        <!-- start google chart takahashi -->
        <script type="text/javascript"
              src="https://www.google.com/jsapi?autoload={
                'modules':[{
                  'name':'visualization',
                  'version':'1',
                  'packages':['corechart']
                }]
              }"></script>

        <script type="text/javascript">
          google.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month', 'あなた', 'ゆっきー', 'めぐみ', 'そめや', 'まり'],
              ['4月21日',  1,    -1,    0,    -0.5,    0],
              ['4月22日',  -1,   -1.4,    1,    -0.7,    -2],
              ['4月23日',  2,    -1.6,    1,    -1.7,    -0.5],
              ['4月24日',  1,    -1.8,    -1.3,    -2,    -0.7],
              ['4月25日',  0.5,  -1.9,    1,    -3,    -0.8],
              ['4月26日',  1,    -2,    -1.3,    -2,    -1],
              ['4月27日',  1.8,  -0.3,    0,    -1,    -1.7]
            ]);

            var options = {
              title: ' ',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('battle_chart'));

            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript">
          google.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month', 'あなた'],
              ['3月27日',  47],
              ['4月21日',  48],
              ['4月22日',  48],
              ['4月23日',  47.5],
              ['4月24日',  47.5],
              ['4月25日',  47.5],
              ['4月26日',  47],
              ['4月27日',  47],
              ['6月27日',  47]
            ]);

            var options = {
              title: ' ',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('me_chart'));

            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript">
          google.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month', '朝バナナ', '白湯', '逆立ち', '蒸し野菜', '脱糖', 'オチョダイエット'],
              ['4月21日',  -1,    -1,    -1,    -2,    0,    -3],
              ['4月22日',  -2,    -1,    -2,    -3,    -2,    -1],
              ['4月23日',  -1,  -2,    -1,    -1,    -1,    -2],
              ['4月24日',  -3,  -3,    0,    -2,    -2,    -2],
              ['4月25日',  -3,  -4,    -1,    -3,    -3,    -3],
              ['4月26日',  -2,    -3,    -2,    -2,    -2,    -5],
              ['4月27日',  -1,    -2,    -3,    -1,    -2,    -6]
            ]);

            var options = {
              title: ' ',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('diet_all_chart'));

            chart.draw(data, options);
          }
        </script>
        <!-- end google chart takahashi -->
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
                            <li class="active"><a href="#portfolio">Profile</a></li>
                            <li><a href="#about">Your weight</a></li>
                            <li><a href="#about2">Your battle</a></li>
                            <li><a href="#clients">Column &amp;　Movie</a></li>
                            <li><a href="#price">Diet</a></li>
                            <li><a href="#contact">Graph</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End main navigation -->
        <!-- profile section start -->
        <div class="section primary-section " id="portfolio">
            <div class="container">
                <div class=" title">
                    <h1>マイページ</h1>
                </div>
                <!-- Start details for portfolio project 1 -->
                <div id="single-project">
                    <div id="slidingDiv" class="toggleDiv row-fluid single-project" style="display:on;">
                        <div class="span6">
                            <img src="images/Portfolio01.png" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3><?php echo $row["nickname"]; ?></h3>
<!--                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
-->                                </div>
                                <div class="project-info">
<!--                                    <div><span>バトルpt</span>100pt</div>
                                    <div><span>交換pt</span>30pt</div>
-->                                    <div><span>目標体重</span><?php echo $row["goal"]; ?>kg</div>
                                    <div><span>現在体重</span><?php echo $row["weight_new"]; ?>kg</div>
                                    <div><span>開始身長</span><?php echo $row["height"]; ?>cm</div>
                                    <div><span>開始体重</span><?php echo $row["weight"]; ?>kg</div>
                                    <div><span>生活リズム</span><?php echo $row["lifestyle"]; ?></div>
                                    <div><span>食生活</span><?php echo $row["eating"]; ?></div><br>
                                    <div><span>自己紹介</span><br><?php echo $row["comment"]; ?></div><br>
                                    <a href="info_change.php" class="da-link button">プロフィール編集</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span9 center contact-info" id="about">
                        <div class="title"><h3>登録から今までの体重記録</h3></div>
                    </div>
                    <div id="me_chart" style="height:200px; margin-bottom:30px;"></div>
                    <br><br>
                    <div class="span9 center contact-info" id="about2">
                        <div class="title"><h3>参加中のダイエットバトル</h3></div>
                    </div>
                    <div id="battle_chart" style="height: 200px"></div>
                    <br><br>
                    <div class="centered">
                        <a href="mybattle.html" class="button">バトルページへ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile section end -->
        <!-- colomun section start -->
        <div id="clients">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>コラム＆ムービー</h1>
                        <p>ダイエットの役に立つコラムやムービーが満載！</p>
                    </div>
                    <div class="row">
                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column1.png" class="centered" alt="column 1">
                                    <strong>飲む点滴!!○酒を飲みながらダイエット!??
                                        <small>2015/04/22/10:20｜つかもん</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column2.png" class="centered" alt="column 2">
                                    <strong>食べても太らない？！食事時間の3つの秘密
                                        <small>2015/04/21/12:20｜be:be network</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column3.png" class="centered" alt="column 3">
                                    <strong>あなたは間違えている！真なるダイエット極意
                                        <small>2015/04/20/09:20｜be:be network</small>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column4.png" class="centered" alt="column 4">
                                    <strong>肉でつくろう！彼から愛される引き締めボディ！
                                        <small>2015/04/19/21:20｜be:be network</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column5.png" class="centered" alt="column 5">
                                    <strong>1日に○分運動するだけで○kg痩せる？！？！
                                        <small>2015/04/18/19:20｜be:be network</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <div class="whopic2">
                                    <img src="images/column6.png" class="centered" alt="column 6">
                                    <strong>ダイエットにおけるタブーを教えてしんぜよう
                                        <small>2015/04/17/13:20｜be:be network</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="centered">
                        <button id="subscribe" class="button button-sp">もっと見る</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- colomun section end -->
        <!-- diet cource section start -->
        <div class="section third-section" id="price">
            <div class="container centered">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h1>ダイエットコース</h1>
                        </div>
                        <ul class="client-nav pull-right">
                            <li id="client-prev"></li>
                            <li id="client-next"></li>
                        </ul>
                    </div>
                    <ul class="row client-slider" id="clint-slider">
                        <li><a href="course.html"><img src="images/clients/ClientLogo01.png" alt="client logo 1"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo02.png" alt="client logo 2"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo03.png" alt="client logo 3"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo04.png" alt="client logo 4"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo05.png" alt="client logo 5"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo07.png" alt="client logo 6"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo08.png" alt="client logo 7"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo09.png" alt="client logo 8"></a></li>
                        <li><a href=""><img src="images/clients/ClientLogo10.png" alt="client logo 9"></a></li>
                    </ul>
                    <div class="title clearfix" id="contact" style="margin-top:30px;">
                        <div class="pull-left">
                            <h2>人気のダイエットの平均減量グラフ</h2>
                        </div>
                    </div>
                    <div id="diet_all_chart" style="height: 200px"></div>
                </div>
            </div>
        </div>
        <!-- diet cource section end -->
        <!-- Footer section start -->
        <div class="footer">
            <p><a href="logout.html" style="color:white">ログアウト</a></p>
            <p><a href="allbattle.html" style="color:white">ダイエットバトル</a></p>  
            <p><a href="mybattle.html" style="color:white">あなたが参加中のバトル</a></p>     
        <!--<p><a href="mypage.php" style="color:white">マイページ</a></p> hotani-->
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
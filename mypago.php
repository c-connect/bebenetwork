
         
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
</head>

<body>
<form action ="mypago.php"  method="POST">
            <input type="text" placeholder = "ID" name="user_id" value="">
            <input type="text" placeholder = "体重" name="weight_num" value="">  
                               <input type="submit" value="入力">
                    <br>                    
          </form>
          <form action ="mypago.php"  method="POST">
            <input type="text" placeholder = "目標体重" name="goal" value="">
            <input type="submit" value="変更">
            <br>
          </form>
        <form action ="mypago.php"  method="POST">
            <input type="text" placeholder = "身長" name="height" value="">
           <input type="submit" value="変更">
            <br>
          </form>
          <form action ="mypago.php"  method="POST">
            <input type="text" placeholder = "生活リズム" name="lifestyle" value="">
            <input type="submit" value="変更">
            <br>
</form>
       <form action ="mypago.php"  method="POST">    
           <input type="text" placeholder = "食生活" name="eating" value="">
            <input type="submit" value="変更"><br>
          </form>
            <form action ="mypago.php"  method="POST">
            <input type="text" placeholder = "コメント" name="comment" value="">
           <input type="submit" value="変更">
         </form>
  
<?php
$connect = mysql_connect("mysql707a.xserver.jp","japangoods_bebe","bebe30");
$db = "japangoods_bebenetwork";
//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

//登録された時間の新しい時間に並べて表示したい
//この１行で実行

$user_id = $_POST['user_id'];
$weight_num = $_POST['weight_num'];
$goal = $_POST['goal'];
$height = $_POST['height'];
$lifestyle = $_POST['lifestyle'];
$eating = $_POST['eating'];
$comment = $_POST['comment'];



$sql=  "UPDATE user_tbl  SET goal = '$goal' WHERE user_id='$user_id' "; 
mysql_db_query($db,$sql);

$sql=  "UPDATE user_tbl  SET height = '$height' WHERE user_id='$user_id' "; 
mysql_db_query($db,$sql);

$sql=  "UPDATE user_tbl  SET height = '$lifestyle' WHERE user_id='$user_id' "; 
mysql_db_query($db,$sql);

$sql=  "UPDATE user_tbl  SET comment = '$comment' WHERE user_id='$user_id' "; 
mysql_db_query($db,$sql);
//$sql=  "UPDATE user_tbl  SET weight_bt = '$weight_num' WHERE user_id='$user_id' "; 
//もしbattle_flg=0つまり参戦していないときは常にbatttle_btが更新される
//バトルが始まるとbattle_btは更新されず、バトルする基準である増減幅で戦う
//mysql_db_query($db,$sql);








$sql=  "INSERT into weight_tbl(user_id,weight_num,datetime_reg)
  VALUES($user_id,$weight_num,sysdate())";
mysql_db_query($db,$sql);

$sql=  "UPDATE user_tbl  SET weight_new = '$weight_num' WHERE user_id='$user_id' "; 
//$weight_numは変数
mysql_db_query($db,$sql);

echo $weight_num;

$sql=  "UPDATE user_tbl  SET weight_bt = '$weight_num' WHERE user_id='$user_id' AND battle_flg = 0 "; 
//もしbattle_flg=0つまり参戦していないときは常にbatttle_btが更新される
//バトルが始まるとbattle_btは更新されず、バトルする基準である増減幅で戦う
mysql_db_query($db,$sql);



$result=mysql_db_query("japangoods_bebenetwork","SELECT * from weight_tbl where user_id = '$user_id' ORDER BY datetime_reg DESC");

while(true){
      $kekka = mysql_fetch_assoc($result);
      if ($kekka == null) {
        break;
      }else{
        $i++;
           // echo"<br>";
           // echo $kekka['weight_num'];
            $UserInfo[$i]["weight_num"] = $kekka['weight_num'];
          //  echo"<br>";
          //  echo $kekka['user_id'];
            $UserInfo[$i]["user_id"] = $kekka['user_id'];
          //  echo"<br>";
          //  echo $kekka["datetime_reg"];
            $UserInfo[$i]["datetime_reg"] = $kekka["datetime_reg"];
         //   echo"<br>";
          }

}

$result=mysql_db_query("japangoods_bebenetwork","SELECT * from user_tbl where user_id = '$user_id' ");

while(true){
      $seika = mysql_fetch_assoc($result);
      if ($seika == null) {
        break;
      }else{
        $i++;
         //   echo "<br>";
         //   echo $seika['battle_flg'];
            $UserInfo2["battle_flg"] = $seika['battle_flg'];
       //     echo "<br>";
       //     echo $seika['user_id'];
            $UserInfo2["user_id"] = $seika['user_id'];
 //           echo "<br>";
 //           echo $seika["datetime_reg"];
           $UserInfo2[$i]["datetime_reg"] = $seika["datetime_reg"];
    //        echo "<br>";
    //        echo $seika["weight_bt"];
            $UserInfo2["weight_bt"] = $seika["weight_bt"];
    //       echo "<br>";
            $UserInfo2["height"] = $seika["height"];
            $UserInfo2["comment"] = $seika["comment"];
            $UserInfo2["lifestyle"] = $seika["lifestyle"];
            $UserInfo2["eating"] = $seika["eating"];//食生活
            $UserInfo2["goal"] = $seika["goal"];
          }

}
echo $UserInfo2["goal"];
echo "<br>";
echo $UserInfo2["weight_new"];
echo "<br>";
echo $UserInfo2["height"];
echo "<br>";
echo $UserInfo2["lifestyle"];
echo "<br>";
echo $UserInfo2["eating"];
echo "<br>";
echo $UserInfo2["comment"];
 

 /*$datetimeArray1= 0;
 var_dump($datetimeArray1);
  $datetimeArray2= 0;
   $datetimeArray3= 0;
    $datetimeArray4= 0;
     $datetimeArray5= 0;
      $datetimeArray6= 0;
       $datetimeArray7= 0;*/




//var_dump($UserInfo[1]["datetime_reg"]);
 $datetimeArray1= explode("-", $UserInfo[1]["datetime_reg"]);
 $datetime1 = $datetimeArray1[1]."/".$datetimeArray1[2];
//var_dump($UserInfo[2]["datetime_reg"]);
 $datetimeArray2= explode("-", $UserInfo[2]["datetime_reg"]);
 $datetime2 = $datetimeArray2[1]."/".$datetimeArray2[2];
//var_dump($UserInfo[3]["datetime"]);
 $datetimeArray3= explode("-", $UserInfo[3]["datetime_reg"]);
 $datetime3 = $datetimeArray3[1]."/".$datetimeArray3[2];
//var_dump($UserInfo[4]["datetime"]);
 $datetimeArray4= explode("-", $UserInfo[4]["datetime_reg"]);
 $datetime4 = $datetimeArray4[1]."/".$datetimeArray4[2];
//var_dump($UserInfo[5]["datetime"]);
 $datetimeArray5= explode("-", $UserInfo[5]["datetime_reg"]);
 $datetime5 = $datetimeArray5[1]."/".$datetimeArray5[2];
//var_dump($UserInfo[6]["datetime"]);
 $datetimeArray6= explode("-", $UserInfo[6]["datetime_reg"]);
 $datetime6 = $datetimeArray6[1]."/".$datetimeArray6[2];
//var_dump($UserInfo[7]["datetime"]);
 $datetimeArray7= explode("-", $UserInfo[7]["datetime_reg"]);
 $datetime7 = $datetimeArray7[1]."/".$datetimeArray7[2];

 //var_dump($UserInfo);
?>


<script>
/*var weight1 = 1;
  var weight2 = 1;
   var weight3 = 1;
    var weight4 = 1;
     var weight5 = 1;
      var weight6 = 1;
       var weight7 = 1;*/

var weight0 = <?php echo $UserInfo2["weight_bt"]; ?>;
//alert(weight0);
var weight1 = "";
var weight2 = "";
var weight3 = "";
var weight4 = "";
var weight5 = "";
var weight6 = "";
var weight7 = "";


/*if(is_null(var weight1)){weight1 = 0;}
 if(is_null(var weight2)){ weight2 = 0;}
  if(is_null(var weight3)){ weight3 = 0;}
   if(is_null(var weight4)){ weight4 = 0;}
    if(is_null(var weight5)){ weight5 = 0;}
     if(is_null(var weight6)){ weight6 = 0;}
      if(is_null(var weight7)){ weight7 = 0;}*/
 

<?php if(isset($UserInfo[7]['weight_num'])){ ?>
weight7 = <?php echo $UserInfo[7]['weight_num']; ?>;
<?php }else{ ?>
weight7 = 12;
<?php } ?>

<?php if(isset( $UserInfo[6]['weight_num'])){ ?>
weight6 = <?php echo $UserInfo[6]['weight_num']; ?>;
<?php }else{ ?>
weight6 = 666;
<?php } ?>

<?php if(isset( $UserInfo[5]['weight_num'])){ ?>
weight5 = <?php echo $UserInfo[5]['weight_num']; ?>;
<?php }else{ ?>
  weight5 = 32;
<?php } ?>

<?php if(isset( $UserInfo[4]['weight_num'])){ ?>
weight4 = <?php echo $UserInfo[4]['weight_num']; ?>;
<?php }else{ ?>
weight4 = 1;
<?php } ?>

<?php if(isset( $UserInfo[3]['weight_num'])){ ?>
weight3 = <?php echo $UserInfo[3]['weight_num']; ?>;
<?php }else{ ?>
  weight3 = 888;
<?php } ?>

<?php if(isset( $UserInfo[2]['weight_num'])){ ?>
weight2 = <?php echo $UserInfo[2]['weight_num']; ?>;
<?php }else{ ?>
weight2 = 1200;
<?php } ?>

<?php if(isset( $UserInfo[1]['weight_num'])){ ?>
weight1 = <?php echo $UserInfo[1]['weight_num']; ?>;
<?php }else{ ?>
 weight1 = 68;
<?php } ?>




/* alert(weight1); 
 alert(weight2); 
 alert(weight3); 
 alert(weight4); 
 alert(weight5); 
 alert(weight6); 
 alert(weight7);*/

var datetime1 = "";
  var datetime2 = "";
   var datetime3 = "";
    var datetime4 = "";
     var datetime5 = "";
      var datetime6 = "";
       var datetime7 = "";

 /* datetime1 = <?php echo "'".$datetime1."'"; ?>;
   datetime2 = <?php echo "'".$datetime2."'"; ?>;
    datetime3 = <?php echo "'".$datetime3."'"; ?>;
     datetime4 = <?php echo "'".$datetime4."'"; ?>;
      datetime5 = <?php echo "'".$datetime5."'"; ?>;
       datetime6 = <?php echo "'".$datetime6."'"; ?>;
        datetime7 = <?php echo "'".$datetime7."'"; ?>;*/

<?php if(isset($datetime1)){ ?>
datetime1 = <?php echo "'".$datetime1."'"; ?>;
<?php }else{ ?>
datetime1 = "";
<?php } ?>

<?php if(isset($datetime2)){ ?>
datetime2 = <?php echo "'".$datetime2."'"; ?>;
<?php }else{ ?>
datetime2 = "";
<?php } ?>

<?php if(isset( $datetime3)){ ?>
datetime3 = <?php echo "'".$datetime3."'"; ?>;
<?php }else{ ?>
datetime3 = "";
<?php } ?>

<?php if(isset( $datetime4)){ ?>
datetime4 = <?php echo "'".$datetime4."'"; ?>;
<?php }else{ ?>
datetime4 = "";
<?php } ?>

<?php if(isset( $datetime5)){ ?>
datetime5 = <?php echo "'".$datetime5."'"; ?>;
<?php }else{ ?>
datetime5 = "";
<?php } ?>

<?php if(isset( $datetime6)){ ?>
datetime6 = <?php echo "'".$datetime6."'"; ?>;
<?php }else{ ?>
datetime6 = "";
<?php } ?>

<?php if(isset($datetime7)){ ?>
datetime7 = <?php echo "'".$datetime7."'"; ?>;
<?php }else{ ?>
datetime7 = "";
<?php } ?>


/* alert(datetime1);
 alert(datetime2);
 alert(datetime3);
 alert(datetime4);
 alert(datetime5);
 alert(datetime6);
 alert(datetime7);*/
</script>

<div id="my_chart" style="height: 500px"></div>
    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }">
    </script>
 <script type="text/javascript">
    google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', '体重', ],
           [datetime7, weight7,       ],
           [datetime6, weight6,       ],
           [datetime5, weight5,       ],
           [datetime4, weight4,       ],
           [datetime3, weight3,       ],
           [datetime2, weight2,       ],
           [datetime1, weight1,       ],
          
          
          
          
         
          
        ]);

        var options = {
          title: '自分の体重記録',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('my_chart'));

        chart.draw(data, options);
      }
      </script>
      <div id="battle_chart" style="height: 500px"></div>
    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }">
    </script>
    <script type="text/javascript">
    google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', '体重', ],
          [datetime7, weight0 - weight7,       ],
          [datetime6, weight0 - weight6,       ],
          [datetime5, weight0 - weight5,       ],
          [datetime4, weight0 - weight4,       ],
          [datetime3, weight0 - weight3,       ],
          [datetime2, weight0 - weight2,       ],
          [datetime1, weight0 - weight1,       ],
        /*  [datetime1, weight0 - weight1,       ],
          [datetime2, weight0 - weight2,       ],
          [datetime3, weight0 - weight3,       ],
          [datetime4, weight0 - weight4,       ],
          [datetime5, weight0 - weight5,       ],
          [datetime6, weight0 - weight6,       ],
          [datetime7, weight0 - weight7,       ],*/
          
        ]);
        var options = {
          title: '体重の増減',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('battle_chart'));

        chart.draw(data, options);
      }
</script>



</body>

</html>
<!doctype html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>提交保费</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<span style="font-size:18px;"> </span><span style="font-size:24px;"><meta http-equiv="refresh" content="5;URL=../signin/index.html"> </span>-->
    <!--<span style="font-size:24px;">//3秒之后自动跳转到res.html，两个属于同一文件下面，要是需要跳转到jsp页面，就 需要在url里面填写url地址————（浏览器的地址栏里面写入的数据，如：http://localhost:8080/TestDemo /1.jsp）</span>-->
  </head>
  <?php
  @$id1=$_POST["InputIdkey"];
  @$short_price1=$_POST["InputShortPrice"];
  @$long_price1=$_POST["InputLongPrice"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cpic2022";

  // 创建连接
  $con = mysqli_connect($servername, $username, $password, $dbname);
  // 检测连接
  if (mysqli_connect_errno())
  {
      echo "连接失败: " . mysqli_connect_error();
  }

  mysqli_query($con,"UPDATE price SET short_price=$short_price1,long_price=$long_price1 WHERE idkey='$id1'");

  $res1 = mysqli_affected_rows($con);
  //echo gettype($res1);
  //$res = (int)$res;
  //echo gettype($res);
  //echo "res1:".$res1;
  function up($res1)
  {
      if ($res1>0)
      {
          echo "数据提交成功";

      }
      else {
          echo "数据提交失败";
      }
  }
  $sql1 = "INSERT INTO info_price (idkey,short_price,long_price,time) VALUES ('$id1',$short_price1,$long_price1,$time1)";
  if (mysqli_query($con, $sql1)) {
      echo "";
  } else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
  }
  mysqli_close($con);
  ?>

  <body>
  <div class="container">

      <form action="../signin/index.php" method="post" class="form-signin">
          <h2 class="form-signin-heading"><?php up(@$res1); ?></h2>
      </form>
      <?php //echo time(time);?>
  </div> <!-- /container -->
  </body>
</html>



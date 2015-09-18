<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
    $x=5;
    {
      $x=10;
      echo $x."\n\t";
    }
    echo $x."<br>";
  ?>

  <?php 
    $xx=5;
    function fun(){
      $xx=10;
      echo "$xx \n<br>";
    }
    echo "$xx \n";
    fun();
  ?>

  <?php
    $a=4;
    $b=3;

    function fun1($a,$b)
    {
      $k=$a+$b/$b+$a;
      echo "$k";
    }
    echo "$a";
    echo "$b";
    //echo "$k";
    fun1(3,4);
  ?>

  <?php
    $aa=5;
    {
      $aa=6;
      echo "<br> $aa";
    }
    
    echo "<br> $aa";
  ?>


</body>
</html>
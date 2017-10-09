<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include  "public.php";
    include "../libs/tree.class.php";
    $obj=new tree();
    //$pid,$db,$table,$step,$flag
    $obj->getTree1(0,$db,"category",0,"");
    echo $obj->ul;
    ?>
</body>
</html>
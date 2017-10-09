<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,body{
            padding:0;margin:0;
        }
        nav{
            width:800px;height:30px;
            margin:0 auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border:1px solid #ccc
        }
    </style>

</head>
<body>
<?php
include "../admin/public.php";
$sql="select * from category where pid=0";
$result=$db->query($sql);
$result->setFetchMode(PDO::FETCH_ASSOC);
?>
<nav>
    <a href="index.php">
        首页
    </a>
    <?php
    /*
    while ($row=$result->fetch()) {
        $sql="select count(cid) as num from category where pid=".$row["cid"];
        $result1=$db->query($sql);
        $result1->setFetchMode(PDO::FETCH_ASSOC);
        $row1=$result1->fetch();
        $num=$row1["num"];
        if($num>0){
            $url="category.php";
        }else{
            $url="lists.php";
        }
        ?>
        <a href="<?php echo $url?>?cid=<?php echo $row['cid']?>">
            <?php
            echo $row["cname"]
            ?>
        </a>
        <?php
    }
    */
    while ($row=$result->fetch()) {
        if($row["state"]==0){
            $url="lists.php";
        }else{
            $url="category.php";
        }
        ?>
        <a href="<?php echo $url ?>?cid=<?php echo $row['cid']?>">
            <?php
            echo $row["cname"]
            ?>
        </a>
        <?php
    }
    ?>

</nav>
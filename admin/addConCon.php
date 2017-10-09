<?php
$cid=$_GET["cid"];
$stitle=$_GET["stitle"];
$scon=$_GET["scon"];
$categoryimg=$_GET["categoryimg"];
include "public.php";
$sql="insert into shows (stitle,scon,cid,categoryimg) values ('{$stitle}','{$scon}',$cid,'{$categoryimg}')";
echo $sql;
if($db->exec($sql)){
    echo "<script>alert('添加成功');location.href='addC.php';</script>";
}
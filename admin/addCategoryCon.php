<?php
include "public.php";
$pid=$_GET["pid"];
$cname=$_GET["cname"];
$sql="insert into category (cname,pid,state) VALUES ('{$cname}',{$pid},0)";
if($db->exec($sql)){
    if($pid!=0) {
        $sql = "update category set state=1 WHERE cid=".$pid;
        $db->exec($sql);
        echo "<script>alert('添加成功');location.href='addCategory.php'</script>";
    }else{
        echo "<script>alert('添加成功');location.href='addCategory.php'</script>";
    }
}
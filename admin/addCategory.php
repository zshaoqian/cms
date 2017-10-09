<?php
include 'public.php';
$cname = $_GET['cname'];
$pid = $_GET['pid'];
$sql="insert into category (cname,pid,state,categoryimg) VALUES ('{$cname}',{$pid},0,'')";
if($db->exec($sql)>0) {
    if ($pid != 0) {
        $sql = "update category set state=1 WHERE cid=".$pid;
        $db->exec($sql);
        echo "<script>alert('添加成功');location.href='category.php'</script>";
    } else {
        echo "<script>alert('添加成功');location.href='category.php'</script>";
    }
}
?>
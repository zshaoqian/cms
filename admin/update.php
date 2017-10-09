<?php
session_start();
$aid= $_SESSION['aid'];
include "public.php";
$name=$_POST['user'];
$aname = htmlspecialchars(addslashes($name));
$apsw = md5($_POST['psw']);
$aphone = $_POST['phone'];
$aphoto = $_POST['aphoto'];
$sql="update  admin set aname='{$aname}',apassword='{$apsw}',aphoto='{$aphoto}',aphone='{$aphone}' where aid=".$aid;
$result=$db->exec($sql);
if ($result){
    echo "<script>alert('更新成功');location.href='user.php'</script>";
}
$_SESSION['aid']='';
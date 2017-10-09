<?php
include "public.php";
$name=$_POST['user'];
$aname = htmlspecialchars(addslashes($name));
$apsw = md5($_POST['psw']);
$aphone = $_POST['phone'];
$aphoto = $_POST['aphoto'];
$sql="insert into admin (`aname`,`apassword`,`aphoto`,`aphone`) VALUES ('{$aname}','{$apsw}','{$aphoto}','{$aphone}')";
$result=$db->exec($sql);
if ($result){
    echo "<script>alert('插入成功');location.href='user.php'</script>";
}

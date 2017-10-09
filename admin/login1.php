<?php
$name=$_POST['username'];
$aname = htmlspecialchars(addslashes($name));
$psw = md5($_POST["password"]);
include 'public.php';
$sql="select * from admin where aname='{$aname}' and apassword='$psw'";
$result = $db->query($sql);
$rows=$result->fetch();
if($rows){
    session_start();
    $_SESSION["login"]='yes';
    $_SESSION["aname"]=$aname;
    $_SESSION["aphoto"]=$rows['aphoto'];
    echo "<script>alert('登录成功');location.href='houtai.php'</script>";
}else{
    echo "<script>alert('账户名或密码错误');location.href='loginPage.php'</script>";
};
?>
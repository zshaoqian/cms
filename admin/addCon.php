<?php
$name = $_POST["user"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$psw = md5($_POST['psw']);
$arr = array(
    'name'=>$name,
    'sex'=>$sex,
    'age'=>$age,
    'phone'=>$phone,
    'psw'=>$psw
);
$origin = json_decode(file_get_contents("user.txt"),true);
$old=sizeof($origin);
$origin[]=$arr;
$new=sizeof($origin);
file_put_contents('user.txt',json_encode($origin));
if($new>$old){
?>
<script>
    alert('插入成功！');
    location.href='user.php';
</script>
<?php }?>


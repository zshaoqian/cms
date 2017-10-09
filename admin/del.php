<?php
    include 'public.php';
    $aid=$_POST['aid'];
    $sql="delete from admin where aid=".$aid;
    $result= $db->exec($sql);
    if($result>0){
        echo "ok";
    }else{
        echo 'error';
    }
?>
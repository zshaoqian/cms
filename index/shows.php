<?php
include "header.php";
?>
<style>
    .shows{
        width:800px;margin:10px auto;
    }
</style>

<div class="shows" >
    <?php
    include  "../admin/public.php";
    $sql="select * from shows where sid=".$_GET["sid"];
    $result=$db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row=$result->fetch();
    echo $row["scon"];
    ?>
</div>
</body>
</html>
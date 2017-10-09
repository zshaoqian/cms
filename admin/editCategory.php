<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="editCategoryCon.php">
        所属分类:<select class="pid" name="pid">
            <option value="0">
                一级分类
            </option>
            <?php
            include "../libs/tree.class.php";
            include "public.php";
            $treeobj=new tree();
            $treeobj->getTree(0,$db,"category",0,"-",$_GET["cid"]);
            echo ($treeobj->str);
            $sql="select * from category where cid=".$_GET["cid"];
            $result=$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row=$result->fetch();
            ?>
        </select><br>
        分类名称:<input type="text" name="cname" value="<?php echo $row['cname']?>"><br>
        <input type="hidden" value="<?php echo $_GET['cid']?>" name="cid">
        <input type="submit" value="添加分类">
    </form>
</body>
</html>
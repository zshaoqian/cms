<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../static/js/upload.js"></script>
</head>
<body>
    <form action="addConCon.php">
        所属分类:
        <select name="cid" >
            <option value="0">一级分类</option>
            <?php
            include "../libs/tree.class.php";
            include "public.php";
            $treeobj=new tree();
            $treeobj->getTree(0,$db,"category",0,"-");
            echo ($treeobj->str);
            ?>
        </select><br>
        内容标题: <input type="text" name="stitle"><br>
        内容: <textarea name="scon"  cols="30" rows="10">

        </textarea><br>
        <input type="hidden" name="categoryimg">
        <div class="box"></div>
        <input type="submit" value="添加">
</body>
</html>
<script>
    window.onload = function () {
        var uploadObj = new upload();
        uploadObj.selectBtnCon="选择图片";
        uploadObj.createView({parent:document.querySelector('.box')});
        uploadObj.up('up.php',function (data) {
            var val=document.querySelector('input[type=hidden]');
            val.value=data.join(';');
        });
    }
</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css">
    <style>
        input[type=text]{
            margin-top:20px;
        }
    </style>
</head>
<body>
<form action="addCategory.php">
    <select class="form-control" name="pid">
        所属分类：<option value="0" >一级分类</option>
        <?php
        include '../libs/tree.class.php';
        include 'public.php';
        $category=new tree();
        $category->getTree(0,$db,'category','0','-');
        echo $category->str;
        ?>
    </select>
    <input type="text" name="cname"><br>
    <input type="submit" value="添加分类">
</form>

</body>
</html>
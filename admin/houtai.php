<?php
session_start();
if (!$_SESSION["login"]){
    echo "<script>location.href='loginPage.php'</script>";
    exit;
};
?>
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
        *{margin: 0;  padding:0;}
        body,html{
            width:100%;height:100%;}
        .container{
            height:20%;
            width:80%;
            margin:auto;
            border:1px solid #ccc;
        }
        .con{
            height:80%;
            box-sizing: border-box;
            border-top: none;
            width:80%;
        }
        .left{
            border-right: 1px solid #ccc;
            height:100%;
        }
        h1{
            text-align: center;
        }
        .right{
            height:100%;
            box-sizing: border-box;
        }
        iframe{
            width:100%;height:99%;
        }
        .header a{
            font-size: 16px;
            float: right;
            margin-right: 20px;
        }
        .son{
            margin-left: 25px;
        }
        .name{
            font-size: 16px;
            float: right;
            margin-right: 35px;
        }
        .photo{
            width:30px;
            height:30px;
            border-radius: 50%;
            border:1px solid #cccccc;
            display: block;
            float: right;
            background: url("<?php echo $_SESSION["aphoto"] ?>")no-repeat top/cover;
        }
    </style>
</head>
<body>
    <div class="container header">
        <h1><?php echo file_get_contents('title.txt'); ?></h1>
        <span class="name"><?php echo $_SESSION["aname"]?></span>
        <span class="photo"></span>
        <a href="login.php">注销</a>
        <a href="../index/index.php" target="_blank">查看首页</a>
    </div>
    <div class="container con">
        <div class="left  col-sm-4 col-xs-6 col-md-3">
            <ul class="list">
                <li >管理员管理
                    <ul class="son">
                        <li><a href="user.php" target="right">查看管理员</a></li>
                        <li><a href="add.php" target="right">添加管理员</a></li>
                    </ul>
                </li>
                <li >分类管理
                    <ul class="son">
                        <li><a href="showcategory.php" target="right">查看分类</a></li>
                        <li><a href="category.php" target="right">添加分类</a></li>
                    </ul>
                </li>
                <li >内容管理
                    <ul class="son">
                        <li><a href="" target="right">查看内容</a></li>
                        <li><a href="addC.php" target="right">添加内容</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right  col-sm-8 col-xs-6 col-md-9">
            <iframe src="" frameborder="0" name="right"></iframe>
        </div>
    </div>
</body>
</html>
<?php
session_start();
if(isset ($_SESSION["login"])){
    echo "<script>alert('已登录');location.href='houtai.php'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../jquery-3.2.1.js"></script>
    <script src="../../jquery.validate.js"></script>
    <title>Document</title>
    <style>
        *{margin:0;padding:0;}
        html,body{width:100%;height: 100%;overflow: hidden}
        body{
            background: url("../../login.jpg") no-repeat center/cover;
            position: relative;
        }
        .error{
            font-size: 14px;
            color: red;

        }
        .page{
            width:260px;
            height:200px;
            margin:235px 643px 0;

        }
        input{
            width:205px;
            height:30px;
            border:none;
            outline: none;
            margin-bottom: 18px;
            padding-left: 3px;
        }
        .submit{
            width:90px;
            height:80px;
            cursor: pointer;
            outline: none;
            background: transparent;
            position: absolute;
            top:225px;
            left:900px;
        }
    </style>
</head>
<body>
<div class="page">
    <form action="login1.php" method="post">
        <input type="text" name="username"><br>
        <input type="password" name="password">
        <input type="submit" class="submit" value="">
    </form>
</div>
<script>
    $(function () {
        $('form').validate({
            rules:{
                username:{
                    required:true,
                    minlength:5
                },
                password:{
                    required:true,
                    minlength:4
                }
            },
            messages:{
                username:{
                    required:'用户名必填',
                    minlength:'最少5位'
                },
                password:{
                    required:'密码必填',
                    minlength:'最少4位'
                }
            }
        })
    })
</script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css">
    <script src="../../jquery-3.2.1.js"></script>
    <script src="../../jquery.validate.js"></script>
    <script src="../static/js/upload.js"></script>
    <style>
        .error{
            font-size: 14px;
            color: red;

        }
    </style>
</head>
<body>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">用户名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="user" name="user">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="psw">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">联系方式</label>
        <input type="telephone" class="form-control" id="exampleInputPassword1" placeholder="phone" name="phone">
    </div>
    <div class="box">
        <input type="hidden" value="" name="aphoto">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<script>
    $(function () {
        $('form').validate({
            rules:{
                user:{
                    required:true,
                    minlength:5
                },
                psw:{
                    required:true,
                    minlength:4
                }
            },
            messages:{
                user:{
                    required:'用户名必填',
                    minlength:'最少5位'
                },
                psw:{
                    required:'密码必填',
                    minlength:'最少4位'
                }
            }
        })
    })
    window.onload = function () {
        var uploadObj = new upload();
        uploadObj.createView({parent:document.querySelector('.box')});
        uploadObj.up('up.php',function (data) {
            var val=document.querySelector('input[type=hidden]');
                val.value=data.join(';');
        });
    }
</script>
</body>
</html>
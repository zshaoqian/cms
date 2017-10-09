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
    <style>
        tr,td,th{
            text-align: center;
        }
        .del,.edit{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table class="table table-bordered table-responsive">
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>头像</th>
            <th>联系方式</th>
            <th colspan="2">编辑</th>
        </tr>
        <?php
        include "public.php";
        $sql="select * from admin";
        $result = $db->query($sql);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        while($row=$result->fetch()){
            /*$ap[0]=explode(';',$row['aphoto'])*/
        ?>
        <tr>
            <td><?php echo $row['aid']?></td>
            <td><?php echo $row['aname']?></td>
            <td><img src="<?php echo $row['aphoto']?>" alt="" width="50"></td>
            <td><?php echo $row['aphone']?></td>
            <td class="del">删除</td>
            <td class="edit"><a href="edit.php?aname=<?php echo $row['aname']?>&aid=<?php echo $row['aid']?>&aphoto=<?php echo $row['aphoto']?>">编辑</a></td>
        </tr>
        <?php }?>
    </table>
    <script>
        $('tbody').on('click','.del',function () {
            $(this).parent().remove();
            var con = $(this).prev().prev().prev().prev().html();
            $.ajax({
                url:'del.php',
                data:{aid:con},
                type:'post',
                success:function (data) {
                    if(data=='ok'){
                        alert('删除成功');
                    }else{
                        alert('error')
                    }
                }
        })
        })
       /* $('tbody').on('click','.edit',function () {
            var con = $(this).prev().prev().prev().prev().prev().html();
            var aname = $(this).prev().prev().prev().prev().html();
            var aphoto = $(this).prev().prev().prev().html();
            var aphone = $(this).prev().prev().html();
            $.ajax({
                url:'edit.php',
                data:{aid:con,aname:aname,aphoto:aphoto,aphone:aphone},
                type:'post',
                success:function (data) {

                }
            })
        })*/

    </script>
</body>
</html>
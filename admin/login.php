<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["aname"]);
unset($_SESSION["aphoto"]);
echo "<script>alert('退出成功');location.href='loginPage.php'</script>"
?>
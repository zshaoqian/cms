<?php
include "header.php";
?>
<style>
    .lists{
        width:800px;
        margin:10px auto;
    }
</style>

<div class="lists">
    <ul>
        <?php
        include  "../admin/public.php";
        $sql="select * from shows where cid=".$_GET["cid"];
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row=$result->fetch()){
            ?>
            <li>
                <a href="shows.php?sid=<?php echo $row['sid']?>">

                    <?php
                    echo $row["stitle"];
                    ?>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
</body>
</html>
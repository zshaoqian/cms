<?php
class tree{
    public $str="";
    public $ul="";
    public  function getTree($pid,$db,$table,$step,$flag,$currentcid){
        //通过当前的cid  获取 当前pid
        $currentPid="";
        if($currentcid){
            $sql="select * from ".$table." where cid=".$currentcid;
            $result=$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row=$result->fetch();
            $currentPid=$row["pid"];
        }
        $sql="select * from ".$table." where pid=".$pid;
        $step+=1;
        $str=str_repeat($flag,$step);
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row=$result->fetch()){
            $cid=$row["cid"];
            $cname=$row["cname"];
            if($cid==$currentPid) {
                $this->str .= "<option value='" . $cid . "' selected>" . $str . $cname . "</option>";
            }else{
                $this->str .= "<option value='" . $cid . "'>" . $str . $cname . "</option>";
            }
            $this->getTree($cid,$db,$table,$step,$flag,$currentcid);
        }
    }
    public  function getTree1($pid,$db,$table,$step,$flag){
        $sql="select * from ".$table." where pid=".$pid;
        $result=$db->query($sql);
        if($result->rowCount()==0){
            return false;
        }
        $this->ul.="<ul>";
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row=$result->fetch()){
            $cid=$row["cid"];
            $cname=$row["cname"];
            $this->ul.="<li>".$cname."<a href='delCategory.php?cid={$cid}'>删除</a> <a href='editCategory.php?cid={$cid}'>编辑</a></li>";
            $this->getTree1($cid,$db,$table,$step,$flag);
        }
        $this->ul.="</ul>";
    }
    /*pid是下一级的，cid是当前这级*/
    public function del($cid,$db,$table){
        $sql="select * from ".$table." where pid=".$cid;
        /*当前分类下面的子分类*/
        $result=$db->query($sql);
        if($result->rowCount()>0){
            echo "<script>alert('有子分类不能删除');location.href='showcategory.php'</script>";
        }else{
            //根据cid查找pid
            $sql1="select pid from ".$table." where cid=".$cid;/*查找所有子类*/
            $result=$db->query($sql1);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row=$result->fetch();
            $pid=$row["pid"];
            $sql="delete from ".$table." where cid=".$cid;
            if($db->exec($sql)){
                $sql="select cname from category where pid= ".$pid;
                $result=$db->query($sql);
                if($result->rowCount()==0){
                    $sql="update category set state=0 where cid=".$pid;
                    if($db->exec($sql)){
                        echo "<script>alert('删除成功');location.href='showCategory.php'</script>";
                    }
                }else{
                    echo "<script>alert('删除成功');location.href='showCategory.php'</script>";
                }
            }
        }
    }
}
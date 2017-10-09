<?php
class upload{
    /*接收-检查-创建目录-整合路径-移入目录*/
    private $type="image/jpeg;image/png;image/gif";
    private $size;
    public $filename="file";
    public $dir = 'loads';
    private $data;
    private $date;
    private $fullpath;
    function __construct(){
        $this->size=1024*1024*7;
    }
    private function accept(){
        $this->data=$_FILES[$this->filename];
    }
    private function check(){
        if(is_uploaded_file($this->data['tmp_name'])){
            if ($this->data['size']<$this->size&&strrchr($this->type,$this->data['type'])){
                return true;
            }
        }else{
            return false;
        }
    }
    private function create(){
        $this->date=date('Y-m-d');
            if (!is_dir('../'.$this->dir)){
                mkdir('../'.$this->dir);
                if (!is_dir('../'.$this->dir.'/'.$this->date)){
                    mkdir('../'.$this->dir.'/'.$this->date);
                }
            }else{
                if (!is_dir('../'.$this->dir.'/'.$this->date)){
                    mkdir('../'.$this->dir.'/'.$this->date);
                }
            }
        $now = time().mt_rand(0,10000).$this->data['name'];
        $this->fullpath='../'.$this->dir.'/'.$this->date.'/'.$now;
    }
    private function filemove(){
        move_uploaded_file($this->data['tmp_name'],$this->fullpath);
    }
    public function move(){
        $this->accept();
        if ($this->check()){
            $this->create();
            $this->filemove();
            echo $this->fullpath;
        }else{
            echo 'error';
        }


    }
}


class upload{

  constructor(){
    this.data=[];
    this.list=[];
    this.multiple=false;
    this.size=1024*1024*10;
    this.type="image/png;image/jpeg;image/gif";
    this.filename="file";
    this.selectBtnStyle="width:150px;height:50px;border-radius:5px;background:orange;";
    this.selectBtnCon="请选择";

    this.upBtnStyle="width:150px;height:50px;border-radius:5px;background:#ccc;"
    this.upBtnCon="点击上传";

    this.pStyle="width:700px;";

      this.listStyle="width:150px;height:150px;float:left;border:1px solid #ccc;padding:5px;";

      this.progressStyle="width:100%;height:5px;position:absolute;bottom:0;left:0;"

      this.bar="width:0%;height:100%;background:red";
      this.errorStyle="width:100%;height:30px;position:absolute;left:0;top:0;right:0;bottom:0;margin:auto;text-align:center;line-height:30px;color:red;background:rgba(0,0,0,.8)";
      this.errorCon="错误";

  }
  /*

     创建 整个视图
  *  params  object
  *
  *  params.parent  父容器
  *  params.selectBtn 选择按钮
  *  params.upBtn     上传按钮
  *  params.p     预览容器
  *
  * */
  createView(params){

           //1. 创建选择按钮
           this.createSelect(params.parent,params.selectBtn,()=>{
               //2.  创建预览的容器

               this.createPview(params.p)
              //3.  创建上传按钮
               this.createUpBtn(params.upBtn);

               //4. 选择文件

               this.change();


           });
  }

  // 开始选择文件

    change(){
      //
      var that=this;
      this.selectBtn.onchange=function(){
            that.data=Array.prototype.slice.call(this.files);
            that.check();
      }
    }

    //针对每一个数据完成检查
    check(){
        var that=this;
        var temp=[];
        for(var i=0;i<this.data.length;i++){
                temp[i]=this.data[i];
                var obj=this.createList(this.data[i]);
                that.list[i]=obj;
                obj.del.index=i;
                (function(obj){
                    obj.list.onmouseover=function(){
                        obj.del.style.display="block";
                    }
                    obj.list.onmouseout=function(){
                        obj.del.style.display="none";
                    }
                })(obj)


              obj.del.onclick=function(){
                  this.parentNode.parentNode.removeChild(  this.parentNode);
                  var tempdata=temp[this.index];

                  for(var j=0;j<that.data.length;j++){
                      if(that.data[j]==tempdata){

                          that.data.splice(j,1);
                          that.list.splice(j,1);
                      }
                  }

              }

              //判断是不是符合类型

            if(this.type.indexOf(this.data[i].type)<0){
                var tempdata=temp[i];

                for(var j=0;j<that.data.length;j++){
                    if(that.data[j]==tempdata){
                        that.data.splice(j,1);
                        that.list.splice(j,1);
                    }
                }
                obj.error.style.display="block";
                obj.error.innerHTML="类型不对";
            }

            //判断大小是不是满足条件
            if(this.data[i]) {
                if (this.size < this.data[i].size) {
                    var tempdata = temp[i];

                    for (var j = 0; j < that.data.length; j++) {
                        if (that.data[j] == tempdata) {
                            that.data.splice(j, 1);
                            that.list.splice(j,1);
                        }
                    }
                    obj.error.style.display = "block";
                    obj.error.innerHTML = "尺寸太大";
                }
            }

        }
    }
    up(url,callback){
        var that=this;
        this.upBtn.onclick=function() {
            for (var i = 0; i < that.data.length; i++) {
                var ajax = new XMLHttpRequest();
                var form = new FormData();
                form.append(that.filename, that.data[i]);
                var arr=[];
                !function(i,ajax){
                    ajax.onload = function (e) {
                        arr.push(ajax.response);
                    if(callback) {
                        callback(arr);
                    }
                }
                    ajax.upload.onprogress = function (e) {
                        var bili = e.loaded / e.total * 100 + "%"
                        that.list[i].bar.style.width = bili;
                    }
                }(i,ajax);
                ajax.open("post", url);
                ajax.send(form);
            }
        }
    }


    //创建预览的列表

    createList(data){
        //列表的容器
        var div=document.createElement("div");
        div.style.cssText=this.listStyle;
        div.style.position="relative";
        var temptype="image/jpeg;image/gif;image/png";
        if(temptype.indexOf(data.type)>-1) {
            //完成 图片数据地址的转换
            var read = new FileReader();
            read.onload = function (e) {
                div.style.background = "url(" + e.target.result + ")";
                div.style.backgroundSize = "cover";
            }
            read.readAsDataURL(data);
        }else{
             var notice=document.createElement("div");
             notice.innerHTML="未知类型";
             div.appendChild(notice);
        }

        //进度条容器
        var progress=document.createElement("div");
        progress.style.cssText=this.progressStyle;
        //进度条
        var bar=document.createElement("div");
        bar.style.cssText= this.bar;
        //错误的容器
        var error=document.createElement("div");
        error.style.cssText=this.errorStyle;
        error.innerHTML=this.errorCon;
        error.style.display="none";

        //删除按钮

        var del=document.createElement("div");
        del.style.cssText="width:20px;height:20px;position:absolute;right:5px;top:5px;text-align:center;line-height:20px;cursor:pointer;border:1px solid #777;display:none";
        del.innerHTML="X";
        progress.appendChild(bar);
        div.appendChild(error);
        div.appendChild(progress);
        div.appendChild(del);
        this.p.appendChild(div);
        return {
            del:del,
            error:error,
            list:div,
            bar:bar
        }
    }
  //创建选择按钮
 createSelect(parent,selectBtn,callback){
     if(!parent){
      console.error("必须指定父元素");
     }
     if(selectBtn){
         this.selectBtn=selectBtn;
         return false;
     }
     this.parent=parent;
     var selectBox=document.createElement("div");
     selectBox.style.cssText=this.selectBtnStyle;
     selectBox.style.position="relative";
     selectBox.style.textAlign="center";
     selectBox.innerHTML=this.selectBtnCon;
     var file=document.createElement("input");
     file.type="file";
     file.name=this.filename;
     if(this.multiple){
         file.multiple="multiple";
     }
     file.style.cssText="opacity:0;position:absolute;z-index:1;height:100%;width:100%;left:0;top:0;";
     selectBox.appendChild(file);
     parent.appendChild(selectBox);
     this.selectBtn=file;
     selectBox.style.lineHeight=selectBox.offsetHeight+"px";
     callback();
 }

 //创建上传按钮

    createUpBtn(obj){
     if(obj){
         this.upBtn=obj;
     }else{
        var div=document.createElement("div");
        div.style.cssText=this.upBtnStyle;
        div.innerHTML=this.upBtnCon;
        this.parent.appendChild(div);
        div.style.textAlign="center";
        div.style.lineHeight=div.offsetHeight+"px";
        this.upBtn=div;
     }
    }
    //创建预览容器

    createPview(obj){
        if(obj){
            this.p=obj;
        }else{
            var div=document.createElement("div");
            div.style.cssText=this.pStyle;
            div.style.overflow='hidden';
            this.parent.appendChild(div);
            this.p=div;
        }
    }
}
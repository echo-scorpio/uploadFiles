<?php 
    session_start();
    // 问卷提交保存页面
    include_once("conn/config.php");//链接数据库
    include_once("conn/function.php");//检测是否登录
    header("Content-Type:text/html;charset:utf-8");

    //获取参数
    $upload=$_POST[upload];
    $file_name=$_FILES['file']['name'];//文件名
    $user_name=$_SESSION[name1];
    if($file_name==""){
        echo "<script>alert('请选择文件！')</script>";
        echo "<script>window.open('./index.php')</script>";
    }
    else{
        $file_size=$_FILES['file']['size']; //$_FILES获取整个传过来的文件
        if($file_size>20*1024*1024){
            echo "<script>alert('上传文件最大不能超过20M')</script>";
            echo "<script>history.go(-1)</script>";
        }
        else{
            //判断是否上传成功（is_uploaded_file函数用于判断文件是否通过post方式上传）  
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {  
                $uploaded_file=$_FILES['file']['tmp_name'];  
                //我们给每个用户动态的创建一个文件夹  
                $user_path=$_SERVER['DOCUMENT_ROOT']."/uploadFiles/file/upload/".$user_name;  

                //判断该用户文件夹是否已经有这个文件夹  
                if(!file_exists($user_path)) {  
                    mkdir($user_path);  
                }  
                date_default_timezone_set('PRC'); //把时区设置为中国时区，不然读出的系统时间差8小时
                $move_to_file=$user_path."/".time().rand(1,1000).substr($file_name,strrpos($file_name,".")); 
                $file_path= str_replace($_SERVER['DOCUMENT_ROOT'], "",$move_to_file); //存到数据库中的文件路径，不能带着项目的根目录，要去掉
                if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
                    mysql_query("set sql_mode=''");
                    $create_time=date("Y-m-d H:i:s",time());
                    $sql="insert into tb_files(`uname`,`fileName`,`fileUrl`,`createTime`) values('$user_name','$file_name','$file_path','$create_time')";
                    $success= mysql_query($sql);// or die(mysql_error()); 输出sql执行的错误信息
                    if($success){
                        echo "<script>alert('上传成功!')</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    }
                    else{
                        echo "<script>alert('上传失败!')</script>";
                        echo "<script>history.go(-1)</script>";
                    }

                } else {  
                    echo "上传失败";  
                    echo "<script>history.go(-1)</script>";
                }  
            }
            
                }
            }
            

    
    
    
?>
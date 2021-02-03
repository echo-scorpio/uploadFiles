<?php

    include_once ("conn/config.php");
    include_once("./conn/function.php");
    //判断是否登录，在function中的login_check函数进行判断
    user_login_check($_SESSION[name1],$_SESSION[data1]);
    header("Content-Type:text/html;charset=utf-8");
    $file=mysql_query("select * from tb_files where uname='$_SESSION[name1]' order by createTime desc");
   while($file_arr=mysql_fetch_array($file)){//循环显示出从数据库中查出的问卷
        $file_id=$file_arr[id];
        $file_name=$file_arr[fileName];
        $file_url=$file_arr[fileUrl];
        $file_createTime=$file_arr[createTime];
        $content .=<<<END
	<p class="tab4-p">
	<span class="tab4-td" style="width:20px;margin-left: 69px;">$file_id</span>
    <span class="tab4-td" style="    margin-left: 107px;
    width: 150px; overflow: hidden;

    text-overflow: ellipsis;
    
    white-space: nowrap;"
    
    ><b>$file_name</b></span>
    <span class="tab4-td" style="margin-left: 66px;">$file_createTime</span>
	<span class="tab4-td" style="margin-left: 50px;
    width: 70px;"><a href="$file_url" download="$file_name">下载</a></span>
	</p>

END;
    }
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文件管理系统</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <div class="blank"></div>
        <div class="header">
            <div class="logo"><img src="images/logo.png" /></div>
            <div class="header-title">个人文件管理系统</div>
            <div class="header-welcome" id="userName"><?php echo $_SESSION[name1] ?></div>
            <a  class="log-out" href='logout.php'>退出</a>
        </div>
        <form action="uploadFile.php" method="post" name="uploadForm" enctype="multipart/form-data">
        <input type="file" name="file"/><button onclick="uploadFile" type="submit" name="upload">上传</button>
        </form>
        <div class="main">
            <table class="tab4">
                <thead>
                    <tr>
                        <th>文件id</th>
                        <th>文件名称</th>
                        <th>上传时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
            </table>
            <?php echo $content;?>
        </div>
    </div>
   
</body>

</html>
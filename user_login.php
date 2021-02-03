<?php 
session_start();
include_once("./conn/config.php");
header("Content-Type:text/html;charest=utf-8");
if($_POST[submit]){
    echo "$_POST[name]<br>$_POST[password]";
    $admin=mysql_query("SELECT * FROM tb_user WHERE uname ='$_POST[name]'");
		$nameok=is_array($admin_row=mysql_fetch_array($admin));
        	if($nameok){
			if($_POST[password]==$admin_row[upass]) $passwordok=ture;
			else $passwordok=false;	
		}
		
		if($passwordok){
            //保存session======
			$_SESSION[name1]=$_POST[name];
			$_SESSION[data1]=md5($admin_row[uname].$admin_row[upass]);
			header("Location: index.php");
		}
		else{
			echo "<script> alert('用户名或密码错误')</script>";
            //密码错误，不保存session
			session_unset();
            session_destroy();	
		}



}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员登陆</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<body style="background:#93defe; background-size: cover;">
   <div class="login_box">
      <div class="login_l_img"><img src="./images/login-img.png" /></div>
      <div class="login">
          <div class="login_logo"><a href="#"><img src="./images/login_logo.png" /></a></div>
          <div class="login_name">
               <p>个人文件管理系统</p>
          </div>
          <form name="login" action="user_login.php" method="post">
              <input class="username" name="name" type="text" placeholder="用户名" >
              
            <input class="userpass" name="password" type="password" id="password" placeholder="密码" />
              <input  value="登录"  type="submit" name="submit" class="login_but">
          </form>
      </div>
      
</div>
</body>
</html>

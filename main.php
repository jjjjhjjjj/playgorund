<?
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>playground</title>
<style type="text/css">
* {
	list-style-type: none;
	margin: 0px;
	padding: 0px;
}
.wrap {
	height: 800px;
	width: 600px;
	margin: auto;
}
.wrap .top {
	height: 50px;
	width: 600px;
	background-image: url(img/top.png);
}
.wrap .logo {
	height: 150px;
	width: 600px;
	border-top-width: 1px;
	border-bottom-width: 1px;
	border-top-style: solid;
	border-bottom-style: solid;
	border-top-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
}
.wrap .menu {
	height: 80px;
	width: 600px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .menu .login {
	float: left;
	height: 80px;
	width: 300px;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #CCC;
}
.wrap .menu .list {
	float: left;
	height: 80px;
	width: 299px;
}
.wrap .main {
	height: 520px;
	width: 600px;
	background-color: #FFF;
	background-image: url(img/main.png);
}
</style>
</head>

<body>

	<div class="wrap">
    	<div class="top"></div>
    	<div class="logo">
        	<a href="main.php"><img src="img/logo.png" /></a>
        </div>
        <div class="menu">
         
         
         <!-- 로그인 안했을 때는 로그인 이미지, 로그인 했을 때는 로그아웃 이미지 -->
         
            <?php if($userid) {   $_SESSION['userid'] = $userid;?>  <div class="login">
            	<a href="logout.php"><img src="img/logout.png" /></a>
            	</div>
            	<?php }
            	else{ ?>
            	<div class="login">
            	<a href="login_form.php"><img src="img/login.png" /></a>
            	</div> <?php } ?>
            	
            	
            <!-- 로그인 안했을 때는 게시판으로 못 넘어가게 함 -->
             	
            <?php if($userid) {?>    <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
            	<?php }
            	else{ ?>
            	  <div class="list">
            	<a href="login_form.php"><img src="img/list.png" /></a>
            </div> <?php } ?>
            
            
            
        
        </div>
        <div class="main"></div>
    </div>
   
</body>
</html>

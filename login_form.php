<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<title>playground login</title>
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
	
}
.wrap .main .login {
	height: 440px;
	width: 600px;
}
.wrap .main .login_img {
	height: 79px;
	width: 600px;
	background-image: url(img/login_img.png);
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .main .login .login_left {
	float: left;
	height: 440px;
	width: 200px;
}
.wrap .main .login .login_left .left_top {
	float: left;
	height: 220px;
	width: 200px;
	background-image: url(img/id.png);
}
.wrap .main .login .login_left .left_bottom {
	float: left;
	height: 220px;
	width: 200px;
	background-image: url(img/pass.png);
}
.wrap .main .login .login_center {
	float: left;
	height: 440px;
	width: 200px;
}
.wrap .main .login .login_center .center_top {
	float: left;
	height: 220px;
	width: 200px;
}
.wrap .main .login .login_center .centert_bottom {
	float: left;
	height: 220px;
	width: 200px;
}
.wrap .main .login .login_center .center_top .input_size {
	width: 180px;
	height: 40px;
	margin-top: 155px;
}
.wrap .main .login .login_center .center_bottom .input_size {
	height: 40px;
	width: 180px;
	margin-top: 25px;
}
.wrap .main .login .login_right {
	float: left;
	height: 440px;
	width: 200px;
}
.wrap .main .login .login_right .right_top {
	float: left;
	height: 300px;
	width: 200px;
}
.wrap .main .login .login_right .right_bottom {
	float: left;
	height: 140px;
	width: 200px;
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
            <div class="login">
            	<a href="login.php"><img src="img/login.png" /></a>
            </div>
            
            
         <?php if($userid) {?>    <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
            	<?php }
            	else{ ?>
            	  <div class="list">
            	<a href="login_form.php"><img src="img/list.png" /></a>
            </div> <?php } ?>
        </div>
        
        
        <div class="main">
       	  <div class="login_img"></div>
          <div class="login">
            	<div class="login_left">
               	  <div class="left_top"></div>
                  <div class="left_bottom"></div>
            </div>
             <Form name="member" action = "login.php">
                <div class="login_center">
               	  <div class="center_top">
                  	<input class="input_size" name="id" type="text" />
                  </div>
                  <div class="center_bottom">
                  	<input class="input_size" name="pass" type="password" />
                  </div>
            </div>
           
                <div class="login_right">
               	  <div class="right_top">
                  	<input type = "image" src="img/loginclick.png" type = "submit" onclick="check_input();"  /></a>
                  </div>
                  <div class="right_bottom">
                  	<a href="member_form.php"><img src="img/join.png" /></a>
                  </div>
              </div>
            </div>
            </Form>
            
        </div>
</div>
</body>
</html>
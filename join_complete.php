<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>playground join</title>
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
.wrap .main .join_top {
	height: 79px;
	width: 600px;
	background-image: url(img/join_img.png);
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .main .join_center {
	float: left;
	height: 440px;
	width: 600px;
}
</style>
</head>

<body>
	<div class="wrap">
    	<div class="top"></div>
    	<div class="logo">
        	<a href="html.php"><img src="img/logo.png" /></a>
        </div>
        <div class="menu">
            <div class="login">
            	<a href="login.php"><img src="img/login.png" /></a>
            </div>
            <div class="list">
            	<a href="board.php"><img src="img/list.png" /></a>
            </div>
        </div>
        <form action="main.php">
        <div class="main">
       	  <div class="join_top"></div>
          <div class="join_center">
          	
          	<input type = "image" src="img/join_complete.png" type = "submit"  /> </a>
          </div>
          </form>
        </div>
</div>
</body>
</html>

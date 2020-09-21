<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>playground listboard</title>
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
.wrap .main .list_img {
	height: 79px;
	width: 600px;
	background-image: url(img/list_img.png);
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .main .list {
	height: 440px;
	width: 600px;
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
         
            <?php if($userid) {   $_SESSION['userid'] = $userid;?>  <div class="login">
            	<a href="logout.php"><img src="img/logout.png" /></a>
            	</div>
            	<?php }
            	else{ ?>
            	<div class="login">
            	<a href="login_form.php"><img src="img/login.png" /></a>
            	</div> <?php } ?>
            	
            <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
        </div>
        <div class="main">
          <div class="list_img"></div>
           <div class="list">

<?

include "dbconn.php";

$sql = "select * from greet where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
$item_subject     = $row[subject];
$item_content     = $row[content];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">

</head>

<body>



		


		<form  name="board_form" method="post" action="insert_greet.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<TABLE border='0' width='600' cellpadding='2' cellspacing='2'>
	<TR>
		<TD width='150' bgcolor='cccccc'>
			<font size='2'><center><b>작성자</b></center></font> 
		</TD>
		<TD>
			<p><input type='text' size='12' name='usernick'  value=<?php echo"$userid";?> > * 필수</p>
		</TD>
	</TR>
	
	

	 
	<TR>
      		<TD colspan='2'>
      		</TD>
	</TR>

	<TR>
		<TD width='150' bgcolor='cccccc'>
			<font size='2'><center><b>글 제목</b></center></font>
		</TD>
		<TD>
			<font size='2'><input type='text' size='70' maxlength='50' name='subject' value= <?php echo"$item_content"?>></input></font>
		</TD>
	</TR>

	<TR>
		<TD bgcolor='cccccc'>
			<font size='2'><center><b>글 내용</b></center></font>
		</TD>
		<TD>
         		<font size='2'>
         		<textarea cols='70' rows='15' wrap='virtual' name='content'  ><?php echo"$item_content"?></textarea>
         		</font>
      		</TD>
	</TR>

	<TR>
      		<TD colspan='2'>
         		<hr size='1' noshade>
      		</TD>
	</TR>

	<TR>
		<TD align='center' colspan='2' width='100%'>
		<TABLE>
			<TR>
			
<TD width='200' align='center'>

					<input Type = "submit" value="전송" >
				</TD>
								
				

			</TR>
		</TABLE>
		</TD>
	</TR>
   
</TABLE>
</center>


		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
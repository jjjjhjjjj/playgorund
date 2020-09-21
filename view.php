<?
session_start();
?>

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
         // 하나의 레코드 가져오기
         
         $item_num     = $row[num];
         $item_id      = $row[id];
         $item_name    = $row[name];
         $item_nick    = $row[nick];
         $item_hit     = $row[hit];
         
         $item_date    = $row[regist_day];
         
         $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
         
         $item_content = $row[content];
         $is_html      = $row[is_html];
         
         if ($is_html!="y")
         {
             $item_content = str_replace(" ", "&nbsp;", $item_content);
             $item_content = str_replace("\n", "<br>", $item_content);
         }
         
         $new_hit = $item_hit + 1;
         
         $sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
         mysql_query($sql, $connect);
         ?>

          
          
          
          
          
          
          
           <center>      
           
                                         
<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
	<TR>
		<TD>
		</TD>
 	</TR>
</TABLE>

<TABLE border='0' width='600'>
	<TR>
    		<TD align='left'>
      		<font size='2'> 작성자 : <?php echo"$item_nick";?></font>
    		</TD>
    		
    		<TD align=right>
      		<font size='2'>작성일: <?php echo"$item_date";?>, 조회수: <?php echo"$new_hit";?></font>
    		</TD>
    	</TR>
</TABLE>

<TABLE border='0' cellspacing=3 cellpadding=3 width='600'>
	<TR bgcolor='cccccc'>
		<TD align='center'>
    		<font size='3'><b><?php echo"$item_subject";?></font>
		</TD>
	</TR>
</TABLE>

<TABLE border='0' cellspacing=5 cellpadding=10 width='600'>
	<TR bgcolor='ededed'>
		<TD><font size='2' color=''><?php echo"$item_content";?></font>
		</TD>
	</TR>
</TABLE>

<TABLE border='0' width='600'>
	<TR>
    		<TD align='right'>
		<font size='2'><br><font size='2'>&nbsp;</font>
    		</TD>
	</TR>
</TABLE>

<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
  	<TR>
  		<TD><hr size='1' noshade>
  		</TD>
  	</TR>
</TABLE>

<TABLE border='0' width='600'>
	<TR>
		<TD align='left'>
			<a href="modify_form.php?num=<?= $item_num?> ">[수정하기]</a>
			<a href="delete.php?num=<?= $item_num?> ">[삭제하기]</a>
		</TD>

		<TD align='right'>
		
			<a href='write_form.php'>[글쓰기]</a>
			<a href='listboard.php'>[목록보기]</a>
 		</TD>
	</TR>
</TABLE>

    </center>      
    <TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
  	<TR>
  		<TD><hr size='1' noshade>
  		</TD>
  	</TR>
</TABLE>
    	<div id="ripple"> 
			<div id="ripple1">댓글</div>
			<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
  	<TR>
  		<TD><hr size='1' noshade>
  		</TD>
  	</TR>
</TABLE>
			<div id="ripple2">
<?
	    $sql = "select * from ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
				<div id="ripple_title">
				<ul>
				<li>작성자 : <?= $ripple_nick ?> &nbsp;&nbsp;&nbsp; <?= $ripple_date ?> <? 
						if($userid=="admin" || $userid==$ripple_id)
				            echo "<a href='delete_ripple.php?num=$ripple_num'>삭제</a>";
					?></li>
			
				</ul>
				</div>
				<div id="ripple_content"> <?= $ripple_content ?><hr></hr></div>
<?
		}
?>
				<form  name="ripple_form" method="post" action="insert_ripple.php"> 
				<input type="hidden" name="num" value="<?= $item_num ?>"> 
				<div id="ripple_insert">
				    <div id="ripple_textarea">
						<textarea rows="3" cols="80" name="ripple_content"></textarea>
					</div>
					<input Type = "submit" value="전송" >
				</div>
				</form>

			</div> <!-- end of ripple2 -->
  		    <div class="clear"></div>
			<div class="linespace_10"></div>
           </div>
        </div>
</div>
</body>
</html>

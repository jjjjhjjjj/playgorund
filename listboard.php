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



<?
	include "dbconn.php";

	$scale=5;			// 한 화면에 표시되는 글 수

    if ($mode=="search") // 검색을 했을 때 검색한 값의 결과를 보여준다.
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
    
		
	if	($total_page<$page) $page-=1; // 페이지 번호가 전체 페이지 수를 초과했을 때 항상 마지막 페이지로 유지
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>



</head>


<body>
	<div class="wrap">
   	  <div class="top"></div>
    	<div class="logo">
        	<a href="main.php"><img src="img/logo.png" /></a>
        </div>
         <div class="menu">
         
            <?php if($userid) { ?>  <div class="login">
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
            	<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
	<TR>
		<TD><hr size='1' noshade>
		</TD>
 	</TR>
</TABLE>              
                    
<TABLE border='0' cellspacing=1 cellpadding=2 width='600'>      

	<TR bgcolor='cccccc'>      
		<TD><font size=2><center><b>번호</b></center></font></TD>      
		<TD><font size=2><center><b>글 제목</b></center></font></TD>      
		<TD><font size=2><center><b>작성자</b></center></font></TD>      
		<TD><font size=2><center><b>작성일</b></center></font></TD>      
		<TD><font size=2><center><b>조회</b></center></font></TD>      
	</TR>   
	

<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>





	<TR bgcolor='ededed'>     
		<TD align=center><font size=2 color='black'><?php echo "$item_num";?></font></TD>     
		<TD align=left>
			<a href="view.php?num=<?php echo"$item_num";?>">
			
			<font size=2 color="black"><?php echo "$item_subject";?></font></a>
		</TD>
		<TD align=center>    
			
			<font size=2 color="black"><?php echo "$item_nick";?></font> 
		</TD>     
		<TD align=center><font size=2><?php echo "$item_date";?></font>
		</TD>     
		<TD align=center><font size=2><?php echo "$item_hit";?></font>     
	</TR>  
	   	


<?
   	   $number--;
   }
?>



</TABLE>     

<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
	<TR>
		<TD><hr size='1' noshade>
		</TD>
 	</TR>
</TABLE> 

<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
	<TR>
		<TD><hr size='1' noshade>
		</TD>
 	</TR>
</TABLE>                    

<center>
                  	                   

		<!-- 현재 페이지에서 1 뺀 값을 보내준다. -->
	<a href="listboard.php?page=<?=$page-1?>">[이전]</a>&nbsp; 


<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='listboard.php?page=$i'> $i </a>";
		}      
   }
?>			
	
<!-- 현재 페이지에서 1 더한 값을 보내준다. -->
<a href="listboard.php?page=<?=$page+1?>">[다음]</a>&nbsp;


	




</center>
<TABLE border='0' width='600' cellpadding='0' cellspacing='0'>
	<TR>
		<TD><hr size='1' noshade>
		</TD>
 	</TR>
</TABLE>                    

<TABLE border=0 width=600>
	<TR>
		<TD align='center'>	
			<TABLE border='0' cellpadding='0' cellspacing='0'>
			<FORM Name='Form' Method='POST' Action='listboard.php?mode=search' >
			<input type='hidden' name='find' value='1'>
			<TR>
				<TD align='right'>
				<select name='find' style="background-color:cccccc;">
				<option value='subject' selected><font size='2'>
                                                        글제목</font></option>
				<option value='content'><font size='2'>
                                                        글내용</font></option>
				<option value='nick'><font size='2'>
                                                        작성자</font></option>
				</select>
				</TD>
				<TD align='left'>
					<input type='text' name='search'  size='20' maxlength='30'>
					<input type='submit' value='검색'>
				</td>
			  </TR>
			  </FORM>
			  </TABLE> 
		</TD>

		<TD align='right'>		
		<a href='write_form.php'>[등록]</a>				
		</TD>
	</TR>
    </TABLE></center>
           </div>
        </div>
</div>
</body>
</html>

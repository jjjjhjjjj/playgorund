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

	$scale=5;			// �� ȭ�鿡 ǥ�õǴ� �� ��

    if ($mode=="search") // �˻��� ���� �� �˻��� ���� ����� �����ش�.
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('�˻��� �ܾ �Է��� �ּ���!');
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

	$total_record = mysql_num_rows($result); // ��ü �� ��

	// ��ü ������ ��($total_page) ��� 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
    
		
	if	($total_page<$page) $page-=1; // ������ ��ȣ�� ��ü ������ ���� �ʰ����� �� �׻� ������ �������� ����
	if (!$page)                 // ��������ȣ($page)�� 0 �� ��
		$page = 1;              // ������ ��ȣ�� 1�� �ʱ�ȭ
 
	// ǥ���� ������($page)�� ���� $start ���  
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
		<TD><font size=2><center><b>��ȣ</b></center></font></TD>      
		<TD><font size=2><center><b>�� ����</b></center></font></TD>      
		<TD><font size=2><center><b>�ۼ���</b></center></font></TD>      
		<TD><font size=2><center><b>�ۼ���</b></center></font></TD>      
		<TD><font size=2><center><b>��ȸ</b></center></font></TD>      
	</TR>   
	

<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	
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
                  	                   

		<!-- ���� ���������� 1 �� ���� �����ش�. -->
	<a href="listboard.php?page=<?=$page-1?>">[����]</a>&nbsp; 


<?
   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='listboard.php?page=$i'> $i </a>";
		}      
   }
?>			
	
<!-- ���� ���������� 1 ���� ���� �����ش�. -->
<a href="listboard.php?page=<?=$page+1?>">[����]</a>&nbsp;


	




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
                                                        ������</font></option>
				<option value='content'><font size='2'>
                                                        �۳���</font></option>
				<option value='nick'><font size='2'>
                                                        �ۼ���</font></option>
				</select>
				</TD>
				<TD align='left'>
					<input type='text' name='search'  size='20' maxlength='30'>
					<input type='submit' value='�˻�'>
				</td>
			  </TR>
			  </FORM>
			  </TABLE> 
		</TD>

		<TD align='right'>		
		<a href='write_form.php'>[���]</a>				
		</TD>
	</TR>
    </TABLE></center>
           </div>
        </div>
</div>
</body>
</html>

<?php
echo "<h4>member ���̺� ����</h4><hr>";
$conn = mysql_connect( "localhost", "root", "apmsetup");
mysql_select_db("test",$conn);

$sql = "create table member(
		id char(15) not null primary key ,
		pass char(15) not null,
		name char(10) not null,
		nick char(10) not null,
		hp char(20) not null,
		email char(80)
	
		)";//stud_score ���̺� ����

$result = mysql_query($sql);

if($result)
	echo "member ���̺� ���� ����!!!";

	else
		echo "���̺� ���� ���� ���� Ȯ��";
		mysql_close($conn);
		
		?>
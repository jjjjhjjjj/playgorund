<?php
echo "<h4>member ���̺� ����</h4><hr>";
$conn = mysql_connect("localhost","root","apmsetup");
mysql_select_db("test",$conn);

$sql = "create table ripple (
   num int not null auto_increment,
   parent int not null,
   id char(15) not null,
   name  char(10) not null,
   nick  char(10) not null,
   content text not null,
   regist_day char(20),
   primary key(num)
)";//stud_score ���̺� ����

$result = mysql_query($sql);

if($result)
	echo "ripple ���̺� ���� ����!!!";

	else
		echo "���̺� ���� ���� ���� Ȯ��";
		mysql_close($conn);
		
		?>
<?php
echo "<h4>member ���̺� ����</h4><hr>";
$conn = mysql_connect( "localhost", "root", "apmsetup");
mysql_select_db("test",$conn);

$sql = "create table greet (
   num int not null auto_increment,
   id char(15) not null,
   name  char(10) not null,
   nick  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   is_html char(1),
   primary key(num)
)";//stud_score ���̺� ����

$result = mysql_query($sql);

if($result)
	echo "greet ���̺� ���� ����!!!";

	else
		echo "���̺� ���� ���� ���� Ȯ��";
		mysql_close($conn);
		
		?>
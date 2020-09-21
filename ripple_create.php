<?php
echo "<h4>member 테이블 생성</h4><hr>";
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
)";//stud_score 테이블 생성

$result = mysql_query($sql);

if($result)
	echo "ripple 테이블 생성 성공!!!";

	else
		echo "테이블 생성 실패 에러 확인";
		mysql_close($conn);
		
		?>
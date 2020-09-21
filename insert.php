<meta charset="euc-kr">
<?
   $hp = $hp1."-".$hp2."-".$hp3;
   $email = $email1."@".$email2;

   include "dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {            // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into member(id, pass, name, nick, hp, email) ";
		$sql .= "values('$id', '$pass', '$name', '$nick', '$hp', '$email')";

		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
		
		echo ("<script>  location.href='join_complete.php'</script>");
   }

   mysql_close();                // DB 연결 끊기
  // echo "
	//   <script>
	//    location.href = '../index.php';
	//   </script>
	//";
?>

   

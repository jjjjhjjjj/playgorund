<meta charset="euc-kr">
<?
   $hp = $hp1."-".$hp2."-".$hp3;
   $email = $email1."@".$email2;

   include "dbconn.php";       // dconn.php ������ �ҷ���

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   if($exist_id) {
     echo("
           <script>
             window.alert('�ش� ���̵� �����մϴ�.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {            // ���ڵ� ���� ����� $sql�� �Է�
	    $sql = "insert into member(id, pass, name, nick, hp, email) ";
		$sql .= "values('$id', '$pass', '$name', '$nick', '$hp', '$email')";

		mysql_query($sql, $connect);  // $sql �� ����� ��� ����
		
		echo ("<script>  location.href='join_complete.php'</script>");
   }

   mysql_close();                // DB ���� ����
  // echo "
	//   <script>
	//    location.href = '../index.php';
	//   </script>
	//";
?>

   

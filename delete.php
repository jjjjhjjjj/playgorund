<?
session_start();

include "dbconn.php";

$sql = "delete from greet where num = $num";
mysql_query($sql, $connect);


$sql1 = "update greet set num = num-1 where num > $num";
mysql_query($sql1,$connect);
mysql_close();



echo "
	   <script>
	    location.href = 'listboard.php';
	   </script>
	";
?>


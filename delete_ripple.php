<?
      include "dbconn.php";

      $sql = "delete from ripple where num=$num";
      mysql_query($sql, $connect);
      mysql_close();

      echo "
	   <script>
	    history.go(-1);
	   </script>
	  ";
?>



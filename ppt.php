�� �ڵ� ����

1.form ���� ���� �� �Ѿ���� ��
<?php if (!document.member_form.id.value)
      {
          alert("���̵� �Է��ϼ���");    
          document.member_form.id.focus();
          return;
      }
      ?>

 2.�α��� ���� ��
 
   <!-- �α��� ������ ���� �α��� �̹���, �α��� ���� ���� �α׾ƿ� �̹��� -->
         
            <?php if($userid) {  ?>  <div class="login">
            	<a href="logout.php"><img src="img/logout.png" /></a>
            	</div>
            	<?php }
            	else{ ?>
            	<div class="login">
            	<a href="login_form.php"><img src="img/login.png" /></a>
            	</div> <?php } ?>
            	
            	
            <!-- �α��� ������ ���� �Խ������� �� �Ѿ�� �� -->
             	
            <?php if($userid) {?>    <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
            	<?php }
            	else{ ?>
            	  <div class="list">
            	<a href="login_form.php"><img src="img/list.png" /></a>
            </div> <?php } ?>
            
            
            
 3. listboard.php
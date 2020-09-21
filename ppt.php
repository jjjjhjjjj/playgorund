상세 코드 설명

1.form 공백 값을 못 넘어오게 함
<?php if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }
      ?>

 2.로그인 했을 때
 
   <!-- 로그인 안했을 때는 로그인 이미지, 로그인 했을 때는 로그아웃 이미지 -->
         
            <?php if($userid) {  ?>  <div class="login">
            	<a href="logout.php"><img src="img/logout.png" /></a>
            	</div>
            	<?php }
            	else{ ?>
            	<div class="login">
            	<a href="login_form.php"><img src="img/login.png" /></a>
            	</div> <?php } ?>
            	
            	
            <!-- 로그인 안했을 때는 게시판으로 못 넘어가게 함 -->
             	
            <?php if($userid) {?>    <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
            	<?php }
            	else{ ?>
            	  <div class="list">
            	<a href="login_form.php"><img src="img/list.png" /></a>
            </div> <?php } ?>
            
            
            
 3. listboard.php
<?
session_start();

?>
<!DOCTYPE html>
<html>
<script>

	//check_input()을 이용해 회원가입 폼이 공백이면 에러 메세지가 뜨게함

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
<head>
<meta charset="EUC-KR">
<title>playground join</title>
<style type="text/css">
* {
	list-style-type: none;
	margin: 0px;
	padding: 0px;
}
.wrap {
	height: 800px;
	width: 600px;
	margin: auto;
}
.wrap .top {
	height: 50px;
	width: 600px;
	background-image: url(img/top.png);
}
.wrap .logo {
	height: 150px;
	width: 600px;
	border-top-width: 1px;
	border-bottom-width: 1px;
	border-top-style: solid;
	border-bottom-style: solid;
	border-top-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
}
.wrap .menu {
	height: 80px;
	width: 600px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .menu .login {
	float: left;
	height: 80px;
	width: 300px;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #CCC;
}
.wrap .menu .list {
	float: left;
	height: 80px;
	width: 299px;
}
.wrap .main {
	height: 520px;
	width: 600px;
}
.wrap .main .join_top {
	height: 79px;
	width: 600px;
	background-image: url(img/join_img.png);
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCC;
}
.wrap .main .join_center {
	float: left;
	height: 385px;
	width: 600px;
}
.wrap .main .join_center .center_left {
	height: 55px;
	width: 150px;
	float: left;
}
.wrap .main .join_center .center_right {
	float: left;
	width: 450px;
	height: 55px;
}
.wrap .main .join_bottom {
	float: left;
	height: 55px;
	width: 600px;
}
.wrap .main .join_center .center_right .center_input {
	margin-top: 20px;
	margin-left: 20px;
}
.wrap .main .join_bottom .bottom_left {
	float: left;
	height: 55px;
	width: 300px;
}
.wrap .main .join_bottom .bottom_rigth {
	float: left;
	height: 55px;
	width: 300px;
}
</style>
</head>

<body>
<form name="member_form" method="post" action="insert.php">
	<div class="wrap">
    	<div class="top"></div>
    	<div class="logo">
        	<a href="main.php"><img src="img/logo.png" /></a>
        </div>
        <div class="menu">
            <div class="login">
            	<a href="login.php"><img src="img/login.png" /></a>
            </div>
            <div class="list">
            	<a href="listboard.php"><img src="img/list.png" /></a>
            </div>
        </div>
        <div class="main">
       	  <div class="join_top"></div>
          <div class="join_center">
            	<div class="center_left">
                	<img src="img/join_id.png" />
            	</div>
                <div class="center_right">
                	<input class="center_input" type="text" name="id">
                </div>
                
                <div class="center_left">
               	  <img src="img/join_pass.png" />
           	</div>
                <div class="center_right">
                	<input class="center_input" type="password" name="pass">
                </div>
                
                <div class="center_left">
               	  <img src="img/join_pass_ok.png" />
           	</div>
                <div class="center_right">
                	<input class="center_input" type="password" name="pass_confirm">
            	</div>
                
                <div class="center_left">
               	  <img src="img/join_name.png" />
           	</div>
                <div class="center_right">
                	<input class="center_input" type="text" name="name">
                </div>
                
                <div class="center_left">
               	  <img src="img/join_nick.png" />
           	</div>
                <div class="center_right">
                	<input class="center_input" type="text" name="nick">
                </div>
                
                <div class="center_left">
               	  <img src="img/join_phone.png" />
            	</div>
            <div class="center_right">
                	<select class="center_input" class="hp" name="hp1"> 
                  	  <option value='010'>010</option>
                      <option value='011'>011</option>
                      <option value='016'>016</option>
                      <option value='017'>017</option>
                      <option value='018'>018</option>
                      <option value='019'>019</option>
                     </select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3">
                </div>
                
                <div class="center_left">
                	<img src="img/join_email.png" />
            </div>
                <div class="center_right">
                	<input class="center_input" type="text" id="email1" name="email1"> @ <input type="text" name="email2">
                </div>
            </div>
           
          <div class="join_bottom">
            	<div class="bottom_left">
                	
                	<input type = "image" src="img/submit.png" type = "submit" onclick=" check_input(); return false"  /> </a>
                </div>
                <div class="bottom_right">
                	<a href="다시작성.html"><img src="img/replay.png"/></a>
                </div>
            </div>
            
        </div>
</div>
</form>
</body>
</html>

 
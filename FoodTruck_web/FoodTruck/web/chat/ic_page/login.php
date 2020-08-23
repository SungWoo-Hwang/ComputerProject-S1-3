<div class="chat_body">
	<div class="login_title">
		MICHAA CHAT LIST
		<p>Login</p>
	</div>

	<div class="login_form_area">
		<form method="post" action="<?=$home_chat_proc_url?>/login.php" name="login_form" onsubmit="return login_func();">
			<div>
				<p><span>ID</span>를 입력하세요.</p>
				<p>
					<input type="text" name="mb_id">
				</p>
			</div>
			<div>
				<p><span>PW</span>를 입력하세요.</p>
				<p>
					<input type="password" name="mb_pw">
				</p>
			</div>

			<button type="submit">LOGIN</button>
		</form>
	</div>
</div>

<script type="text/javascript">
<!--
function login_func(){
	var f = document.login_form;
	if(f.mb_id.value == ""){
		alert( "아이디를 입력해주세요." );
		return false;
	}
	if(f.mb_pw.value == ""){
		alert( "비밀번호를 입력해주세요." );
		return false;
	}


}
//-->
</script>
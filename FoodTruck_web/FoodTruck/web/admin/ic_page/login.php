<!-- container -->
	<div id="container">
		<article>
			<div id="content">
				<div id="article">
				<article>
					<div class="login_area">
						<h1 class="logo" style="font-size: 50px;">
							관리자
						</h1>
						<div style="margin-top: 10px;font-size: 20px">
							관리시스템
						</div>
						<div class="login_form"> 
							<form method="POST" name="form_area" action="<?=$home_admin_proc_url?>/login.php" >
								<fieldset>
									<input type="text" id="login_id" name="login_id" class="login_id" placeholder="아이디" />
									<input type="password" id="login_pw" name="login_pw" class="login_pw" placeholder="비밀번호" />

									<a href="javascript:;" onclick="form_func()" class="btn_login" title="LOGIN">
										<span>LOGIN</span>
									</a>
								</fieldset>
							</form>
						</div>
					</div>
				</article>
				</div>
			</div>
		</article>
	</div>
<!-- //container -->

<script type="text/javascript">
<!--

function form_func(){
	var f = document.form_area;
	if(f.login_id.value == ""){
		alert('아이디를 입력해주세요.');
		return;
	}
	if(f.login_pw.value == ""){
		alert('비밀번호를 입력해주세요.');
		return;
	}
	f.submit();
}

//-->
</script>
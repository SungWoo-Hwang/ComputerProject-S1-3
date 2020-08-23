<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('탈퇴 처리','aboat', 'oklinkurl');" >
			<span>탈퇴처리</span>
		</a>
		<?
		$balck_comment = "블랙리스트에 추가시 서비스이용이 제한됩니다.\\n블랙리스트에 추가하시겠습니까?";
		?>
		<a href="javascript:;" class="btn list" onclick="confirm_pop('블랙리스트','blacklist', 'oklinkurl2');">
			<span>블랙리스트 추가</span>
		</a>
	</div>
</div>
<!--// button_area -->

<!-- table_area -->
<div class="table_area">
	<h4 class="title">기본정보</h4>
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 40%">
			<col style="width: 10%;">
			<col style="width: 40%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				가입일
			</th>
			<td>
				2019.01.20 15:00
			</td>
			<th scope="row">
				OS
			</th>
			<td>
				안드로이드
			</td>
		</tr>
		<tr>
			<th scope="row">
				이메일
			</th>
			<td>
				<input type="text" class="in_wp300" />

				<button class="btn done" style="height: 30px;" >
					<span>중복확인</span>
				</button>	

			</td>
			<th scope="row">
				비밀번호
			</th>
			<td>
				<input type="text" class="in_wp300" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				이름
			</th>
			<td>
				<input type="text" class="in_wp150" />
				<strong><font color="blue">실명인증됨</font></strong>
			</td>
			<th scope="row">
				닉네임
			</th>
			<td>
				<input type="text" class="in_wp150" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				휴대폰
			</th>
			<td>
				<input type="text" class="in_wp150" />
			</td>
			<th scope="row">
				핸드폰번호
			</th>
			<td>
				<input type="text" class="in_wp150" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				포인트
			</th>
			<td>
				<input type="text" class="in_wp150" /> 원
			</td>
			<th scope="row">
				주문건
			</th>
			<td>
				6건
			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->


<!-- table_area -->
<div class="table_area">
	<h4 class="title">퀵딜맨 정보</h4>
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 40%">
			<col style="width: 10%;">
			<col style="width: 40%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				가입일
			</th>
			<td>
				2019.01.20 15:00
			</td>
			<th scope="row" rowspan="2">
				프로필
			</th>
			<td rowspan="2">
				
				<img src="<?=$home_img_url?>/admin/.png" onerror="this.src='./images/common/no_img.png'" width="100">
			</td>
		</tr>
		<tr>
			<th scope="row">
				인증일
			</th>
			<td>
				2019.01.20 15:00
			</td>
		</tr>
		<tr>
			<th scope="row">
				주배송수간
			</th>
			<td>
				도보, 퀵보드, 오토바이
			</td>
			<th scope="row">
				주소
			</th>
			<td>
				서울시 송파구 문정동 지아 104-1104
			</td>
		</tr>
		<tr>
			<th scope="row">
				나이 / 성별
			</th>
			<td>
				36 / 남자
			</td>
			<th scope="row">
				계좌정보
			</th>
			<td>
				국민은행 / 강대욱<BR>
				78816516516116
			</td>
		</tr>
		<tr>
			<th scope="row">
				수행건 / 추천수
			</th>
			<td>
				13건 / 35명
			</td>
			<th scope="row">
				총수익
			</th>
			<td>
				1,250,000원
			</td>
		</tr>
		<tr>
			<th scope="row">
				계약서
			</th>
			<td>
				<p><a href="#">배송위탁계약서</a></p>
				<p class="margint5"><a href="#">배송위탁계약서</a></p>
				<p class="margint5"><a href="#">배송위탁계약서</a></p>
			</td>
			<th scope="row">
				QR코드
			</th>
			<td>
				<img src="./images/common/img_upload_icon.png" width="100">
				<p class="margint5" style="width: 100px; text-align: Center;">
					<button class="btn done" style="height: 30px;" >
						<span>다운로드</span>
					</button>				
				</p>
			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->


<!-- button_area -->
<div class="button_area">
	<div class="alignc">
		<a href="javascript:history.go(-1);" class="btn list" title="목록 페이지로 이동">
			<span>목록</span>
		</a>
		<button class="btn save" title="저장하기">
			<span>저장</span>
		</button>
	</div>
</div>
<!--// button_area -->
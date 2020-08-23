<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('삭제처리','delete', 'oklinkurl');" >
			<span>삭제</span>
		</a>
	</div>
</div>
<!--// button_area -->

<!-- table_area -->
<div class="table_area">
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 90%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				등록일자
			</th>
			<td>
				2018-09-16 15:30
			</td>
		</tr>
		<tr>
			<th scope="row">
				이름
			</th>
			<td>NAME</td>
		</tr>
		<tr>
			<th scope="row">
				이메일
			</th>
			<td>asdf@naver.com</td>
		</tr>
		<tr>
			<th scope="row">
				휴대폰
			</th>
			<td>010-5123-1234</td>
		</tr>
		<tr>
			<th scope="row">
				상담내용
			</th>
			<td>
				안녕하세요.<BR>
				문의드립니다.
			</td>
		</tr>
		<tr>
			<th scope="row">
				답변
			</th>
			<td>
				<button class="btn prove marginb10 " onclick="$('.l_pop01').show();">
					<span>자주 사용하는 답변</span>
				</button>				
				<textarea name="" rows="" cols="" class="in_w100" placeholder="답변을 입력하세요."></textarea>
			</td>
		</tr>
		<tr>
			<th scope="row">
				답변완료일
			</th>
			<td>
				2018-09-16 15:30
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

<div class="layer_pop l_pop01" style="display: none;">
	<div style="margin-top: 150px; overflow-y: scroll; overflow-x:hidden; height: 500px;">
		<div class="title_txt">
			자주사용하는 답변
			<a href="javascript:;" onclick="$('.l_pop01').hide();" class="pop_close" title="페이지 닫기">
				<span>닫기</span>
			</a>			
		</div>
		<ul class="faq_fa_form_area">
			<li><textarea name="comment" rows="" cols="" class="in_w100" placeholder="내용을 입력해 주세요."></textarea></li>
			<li>
				<button type="button">등록</button>				
			</li>
		</ul>

		<ul class="faq_fa_form_selecter">
			<li>
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
			</li>
			<li>
				<button type="button">사용</button>				
				<button type="button">삭제</button>				
			</li>
		</ul>
		<ul class="faq_fa_form_selecter">
			<li>
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
			</li>
			<li>
				<button type="button">사용</button>				
				<button type="button">삭제</button>				
			</li>
		</ul>
		<ul class="faq_fa_form_selecter">
			<li>
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
				안녕하세요. 자주사용하는 답변입니다. 안녕하세요 자주사용하는 답변입니다
			</li>
			<li>
				<button type="button">사용</button>				
				<button type="button">삭제</button>				
			</li>
		</ul>
	</div>
</div>

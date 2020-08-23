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
				질문
			</th>
			<td>
				<input type="text" class="in_w100" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				질문유형
			</th>
			<td>
				<select name="">
					<option value="" selected>전체
					<option value="">일반문의
					<option value="">배송지연
					<option value="">신고하기
					<option value="">기타문의
					<option value="">제휴
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row">
				사용여부
			</th>
			<td>
				<input type="radio" name="radio2" value="" id="radio202"> <label for="radio202">사용</label>　　
				<input type="radio" name="radio2" value="" id="radio203"> <label for="radio203">사용안함</label>
			</td>
		</tr>
		<tr>
			<th scope="row">
				답변
			</th>
			<td>
				<textarea name="" rows="" cols="" class="in_w100" placeholder="답변을 입력하세요."></textarea>
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
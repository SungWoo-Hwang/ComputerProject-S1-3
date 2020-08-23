
<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<button class="btn save linkbutton" title="등록" ldata="<?=$link_url?>&pt=write">
			<span>등록</span>
		</button>
	</div>
</div>
<!--// button_area -->



<!-- button_area -->
<div class="button_area02">
	<div class="float_left">
		검색결과 <font color="blue"><strong>12,345</strong></font>
	</div>
</div>
<!--// button_area -->

<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 5%;">
			<col style="width: 10%;">
			<col style="width: 50%;">
			<col style="width: 10%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">등록일자</th>
			<th scope="col">상담내용</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">답변처리</th>
			<th scope="col">상세보기</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>5</td>
			<td>2017/12/12 16:30</td>
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write">
					내용이 들어갑니다
				</a>
			</td>
			<td>홍길동</td>
			<td>닉네임</td>
			<td>답변완료</td>
			<td>
				<button class="btn prove linkbutton" ldata="<?=$link_url?>&pt=write">
					<span>상세보기</span>
				</button>				
			</td>
		</tr>
		</tbody>
	</table>
</div>
<!--// table 1dan list -->	

<!-- paging_area -->
<div class="paging_area02">
	<a href="#" class="stimg" title="맨처음 페이지로 이동"><img src="./images/common/btn_paging_first_off.png" alt="맨처음 페이지로 이동"></a>
	<a href="#" class="stimg" title="전 페이지로 이동"><img src="./images/common/btn_paging_prev_off.png" alt="전 페이지로 이동"></a>
	page
	<strong>1</strong>
	of 22
	<a href="#" class="stimg" title="다음 페이지로 이동"><img src="./images/common/btn_paging_next_on.png" alt="다음 페이지로 이동"></a>
	<a href="#" class="stimg" title="맨마지막 페이지로 이동"><img src="./images/common/btn_paging_last_on.png" alt="맨마지막 페이지로 이동"></a>
</div>
<!--// paging_area -->	


<div class="layer_pop l_pop01" style="display: none;">
	<div>
		<div class="title_txt">
			메시지 보내기
			<a href="javascript:;" onclick="$('.l_pop01').hide();" class="pop_close" title="페이지 닫기">
				<span>닫기</span>
			</a>			
		</div>
		<div class="comment_txt">
			<p><strong>이름</strong> 회원에게 메시지를 전송합니다.</p>
			<textarea name="comment" rows="" cols="" class="in_w100" placeholder="내용을 입력해 주세요."></textarea>
		</div>

		<!-- button_area -->
		<div class="button_area">
			<div class="alignc">
				<button type="button" class="btn cancel" title="취소하기" onclick="$('.l_pop01').hide();">
					<span>취소</span>
				</button>
				<button class="btn save" >
					<span>확인</span>
				</button>
			</div>
		</div>
		<!--// button_area -->			
	</div>
</div>

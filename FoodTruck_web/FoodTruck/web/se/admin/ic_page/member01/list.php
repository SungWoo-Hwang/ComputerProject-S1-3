
<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<button class="btn save linkbutton" title="등록" ldata="<?=$link_url?>&pt=write">
			<span>등록</span>
		</button>
	</div>
</div>
<!--// button_area -->

<!-- search_area -->
<div class="search_area">
	<table class="search_box">
		<caption>통합검색 화면</caption>
		<colgroup>
			<col style="width: 120px;" />
			<col style="width: *;" />
			<col style="width: 120px;" />
			<col style="width: *;" />
		</colgroup>
		<tbody>
		<tr>
			<th>회원구분</th>
			<td>
				<input type="radio" name="radio1" value="" id="radio01" checked> <label for="radio01">전체</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">일반</label>　　
				<input type="radio" name="radio1" value="" id="radio03"> <label for="radio03">퀵딜맨</label>
			</td>
			<th>검색</th>
			<td>
				<input type="text" name="" class="in_w100" placeholder="이름, 닉네임, 휴대폰, 이메일">
			</td>
		</tr>
		<tr>
			<th>가입일</th>
			<td>
				<input type="text" name="" class="in_wp100" placeholder="">
				~
				<input type="text" name="" class="in_wp100" placeholder="">
			</td>
			<th>OS</th>
			<td>
				<input type="radio" name="radio2" value="" id="radio201"> <label for="radio201">전체</label>　　
				<input type="radio" name="radio2" value="" id="radio202"> <label for="radio202">안드로이드</label>　　
				<input type="radio" name="radio2" value="" id="radio203"> <label for="radio203">아이폰</label>
			</td>
		</tr>

		</tbody>
	</table>
	<div class="search_area_btnarea alignc margint10">
		<button class="btn clear" title="초기화 하기">
			<span>기본설정</span>
		</button>
		<button class="btn sch" title="조회하기">
			<span>검색</span>
		</button>
	</div>
</div>
<!--// search_area -->


<!-- button_area -->
<div class="button_area02">
	<div class="float_left">
		검색결과 <font color="blue"><strong>12,345</strong></font>
	</div>
	<div class="float_right">
		<button class="btn homepage" title="저장하기">
			<span>엑셀다운로드</span>
		</button>
	</div>
</div>
<!--// button_area -->

<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 3%;">
			<col style="width: 2%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 10%;">
			<col style="width: 5%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">OS</th>
			<th scope="col">가입일</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">휴대폰</th>
			<th scope="col">이메일</th>
			<th scope="col">퀵딜맨 가입일</th>
			<th scope="col">퀵딜맨 인증일</th>
			<th scope="col">주소</th>
			<th scope="col">메시지</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>5</td>
			<td>A</td>
			<td>2018-10-10 15:32</td>
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write">
					Name
				</a>
			</td>
			<td>Nick Name</td>
			<td>01021541215</td>
			<td>abc@naver.com</td>
			<td>2018-10-10 15:32</td>
			<td>2018-10-10 15:32</td>
			<td>서울시 송파구 문정동 자이 104-1104</td>
			<td>
				<button class="btn homepage" title="저장하기" onclick="$('.l_pop01').show();">
					<span>메시지 보내기</span>
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

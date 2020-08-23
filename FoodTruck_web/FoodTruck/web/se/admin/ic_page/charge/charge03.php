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
			<th>사용일</th>
			<td>
				<input type="text" name="" class="in_wp100" placeholder="">
				~
				<input type="text" name="" class="in_wp100" placeholder="">
			</td>
			<th>검색</th>
			<td>
				<input type="text" name="" class="in_w100" placeholder="이름">
			</td>
		</tr>
		<tr>
			<th>충전처리</th>
			<td>
				<input type="radio" name="radio2" value="" id="radio201"> <label for="radio201">전체</label>　　
				<input type="radio" name="radio2" value="" id="radio202"> <label for="radio202">사용</label>　　
				<input type="radio" name="radio2" value="" id="radio203"> <label for="radio203">환불</label>
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



<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 5%;">
			<col>
			<col>
			<col>
			<col>
			<col>
			<col>
			<col style="width: 10%;">
			<col>
			<col style="width: 10%;">
			<col style="width: 30%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">구분</th>
			<th scope="col">회원구분</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">휴대폰</th>
			<th scope="col">사용 포인트</th>
			<th scope="col">사용일</th>
			<th scope="col">환불포인트</th>
			<th scope="col">환불일</th>
			<th scope="col">사용내역</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>5</td>
			<td>사용</td>
			<td>퀵딜맨</td>
			<td>Name</td>
			<td>Nick Name</td>
			<td>01021541215</td>
			<td>200</td>
			<td>2018-10-10 15:32</td>
			<td></td>
			<td></td>
			<td class="alignl">
				퀵딜 | 서류발송
			</td>
		</tr>
		<tr>
			<td>5</td>
			<td>사용</td>
			<td>퀵딜맨</td>
			<td>Name</td>
			<td>Nick Name</td>
			<td>01021541215</td>
			<td>20,000</td>
			<td>2018-10-10 15:32</td>
			<td style="color: red;">-20,000</td>
			<td>2018-10-10 15:32</td>
			<td class="alignl">
				퀵딜 | 배송취소(환불)
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

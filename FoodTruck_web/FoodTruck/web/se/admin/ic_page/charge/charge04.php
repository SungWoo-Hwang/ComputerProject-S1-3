
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

<!-- button_area -->
<div class="button_area">
	<div class="float_left">
		<button class="btn list linkbutton" ldata="<?=$home_admin_proc_url?>/asdfjlkasjdflajsldf.php">
			<span>지급</span>
		</button>
		<button class="btn list linkbutton" ldata="<?=$home_admin_proc_url?>/asdfjlkasjdflajsldf.php">
			<span>지급취소</span>
		</button>
	</div>
	<div class="float_right">
		<button class="btn homepage" title="저장하기">
			<span>엑셀다운로드</span>
		</button>
	</div>
</div>
<!--// button_area -->


<!-- table 1dan list -->
<div class="table_area margint5">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 5%;">
			<col style="width: 8%;">
			<col style="width: 8%;">
			<col style="width: 10%;">
			<col style="width: 25%;">
			<col style="width: 10%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
			<col style="width: 5%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="">
			</th>
			<th scope="col">NO</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">휴대폰</th>
			<th scope="col">계좌정보</th>
			<th scope="col">출금요청액</th>
			<th scope="col">출금요청일</th>
			<th scope="col">지급일</th>
			<th scope="col">지급여부</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><input type="checkbox" name=""></td>
			<td>5</td>
			<td>name</td>
			<td>nickname</td>
			<td>01021541215</td>
			<td>은행명, 5458646546454, 예금주명</td>
			<td>20,000</td>
			<td>2018-10-10 15:32</td>
			<td>2018-10-10 15:32</td>
			<td>지급완료</td>
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

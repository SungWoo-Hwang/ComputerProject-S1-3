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
			<th>가입일</th>
			<td>
				<input type="text" name="" class="in_wp100" placeholder="">
				~
				<input type="text" name="" class="in_wp100" placeholder="">
			</td>
			<th>검색</th>
			<td>
				<input type="text" name="" class="in_w100" placeholder="이름, 휴대폰, 이메일">
			</td>
		</tr>
		<tr>
			<th>탈퇴일</th>
			<td>
				<input type="text" name="" class="in_wp100" placeholder="">
				~
				<input type="text" name="" class="in_wp100" placeholder="">
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
	<button class="btn list linkbutton" ldata="<?=$home_admin_proc_url?>/asdfjlkasjdflajsldf.php" >
		<span>계정복구</span>
	</button>
	검색결과 <font color="blue"><strong>12,345</strong></font>
</div>
<!--// button_area -->

<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 5%;">
			<col style="width: 10%;">
			<col style="width: 10%;">
			<col style="width: 10%;">
			<col style="width: 10%;">
			<col style="width: 10%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="">
			</th>
			<th scope="col">NO</th>
			<th scope="col">가입일</th>
			<th scope="col">이름</th>
			<th scope="col">휴대폰</th>
			<th scope="col">이메일</th>
			<th scope="col">탈퇴일자</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><input type="checkbox" name=""></td>
			<td>5</td>
			<td>2018-10-10 15:32</td>
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write">
					Name
				</a>
			</td>
			<td>01021541215</td>
			<td>abc@naver.com</td>
			<td>2018-10-10 15:32</td>
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


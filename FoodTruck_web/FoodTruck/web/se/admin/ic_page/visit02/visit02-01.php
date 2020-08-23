<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "visit02-01"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=visit02-01">일반회원 이용건수</a></li>
		<li <?if($pt == "visit02-02"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=visit02-02">퀵딜맨 수행 건수</a></li>
	</ul>
</div>

<!-- search_area -->
<div class="search_area margint50">
	<table class="search_box">
		<caption>통합검색 화면</caption>
		<colgroup>
			<col style="width: 120px;" />
			<col style="width: *;" />
			<col style="width: 120px;" />
			<col style="width: *;" />
			<col style="width: 120px;" />
			<col style="width: *;" />
		</colgroup>
		<tbody>
		<tr>
			<th>날짜</th>
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
	<div class="float_left">
		이용건수
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
		</colgroup>
		<thead>
		<tr>
			<th scope="col">순위</th>
			<th scope="col">회원명</th>
			<th scope="col">닉네임</th>
			<th scope="col">휴대폰</th>
			<th scope="col">이메일</th>
			<th scope="col">가입일</th>
			<th scope="col">이용 건수</th>
			<th scope="col">자출비용</th>
		</tr>
		</thead>
		<tbody>
		<?for($i = 1; $i < 18; $i++){?>
		<tr>
			<td><strong><?=$i?></strong></td>
			<td>퀵딜맨</td>
			<td>퀵딜맨</td>
			<td>01045875421</td>
			<td>asdf@naver.com</td>
			<td>2018-01-01 15:31</td>
			<td>35</td>
			<td>8,950,054,000</td>
		</tr>
		<?}?>
		</tbody>
	</table>
</div>
<!--// table 1dan list -->	

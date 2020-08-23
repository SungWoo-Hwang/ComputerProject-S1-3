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
			<th>주문시간</th>
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
			<th>진행현황</th>
			<td colspan="3">
				<input type="radio" name="radio1" value="" id="radio01" checked> <label for="radio01">전체</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">매칭중</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">배송시작</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">배송중</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">배송완료</label>　　
				<input type="radio" name="radio1" value="" id="radio02"> <label for="radio02">요청취소</label>　　
				<input type="radio" name="radio1" value="" id="radio03"> <label for="radio03">배송취소</label>
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
			<col style="width: 7%;">
			<col style="width: 5%;">
			<col style="width: 5%;">
			<col style="width: 10%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
			<col style="">
			<col style="">
			<col style="">
			<col style="">
			<col style="width: 10%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">진행현황</th>
			<th scope="col">일자</th>
			<th scope="col">시간</th>
			<th scope="col">고객</th>
			<th scope="col">출발지</th>
			<th scope="col">도착지</th>
			<th scope="col">물품종류</th>
			<th scope="col">배송요청금액</th>
			<th scope="col">퀵딜맨 운임</th>
			<th scope="col">수수료</th>
			<th scope="col">퀵딜맨</th>
			<th scope="col">상세보기</th>
		</tr>
		</thead>
		<tbody>
		<?
		$status_title = array('매칭중','배송시작','배송중','배송완료','요청취소','배송취소');
		$status_class = array('status_type01','status_type02','status_type03','status_type04','status_type05','status_type05');
		for($i = 0; $i < 6; $i++){
		?>
		<tr>
			<td><?=(6-$i)?></td>
			<td>
				<span class="status <?=$status_class[$i]?>"></span>
				<?=$status_title[$i]?>
			</td>
			<td>02-22</td>
			<td>12:15</td>
			<td>
				Name<BR>010-1523-1234
			</td>
			<td>서울 강남구 삼성동</td>
			<td>서울 강동구 고덕동</td>
			<td>봉투 서류</td>
			<td>20,000</td>
			<td>18,000</td>
			<td>2,000</td>
			<td>
				Name<BR>010-1523-1234
			</td>
			<td>
				<button class="btn prove linkbutton" ldata="<?=$link_url?>&pt=write">
					<span>상세보기</span>
				</button>		
			</td>
		</tr>
		<?}?>
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


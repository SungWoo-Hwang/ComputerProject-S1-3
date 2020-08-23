<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('배송 삭제','delete', 'oklinkurl');" >
			<span>삭제</span>
		</a>
	</div>
</div>
<!--// button_area -->

<!-- table_area -->
<div class="table_area">
	<h4 class="title">배송정보</h4>
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
				배송정보
			</th>
			<td colspan="3">
				<select name="">
					<option value="" selected>퀵딜맨
					<option value="">
				</select>

				<button class="btn done" style="height: 30px;" >
					<span>변경</span>
				</button>	

			</td>
		</tr>
		<tr>
			<th scope="row">
				고객명
			</th>
			<td>
				<input type="text" class="in_wp200" />
			</td>
			<th scope="row">
				휴대폰번호
			</th>
			<td>
				<input type="text" class="in_wp200" />
			</td>
		</tr>

		<tr>
			<th scope="row">
				물품명
			</th>
			<td>
				<input type="text" class="in_wp300" />
			</td>
			<th scope="row" rowspan="2">
				물품종류
			</th>
			<td>
				<select name="">
					<option value="" selected>선택하기
					<option value="">
				</select>
				<select name="">
					<option value="" selected>선택하기
					<option value="">
				</select>
			</td>
		</tr>

		<tr>
			<th scope="row">
				배송요청일
			</th>
			<td>
				<select name="">
					<option value="" selected>2019.01.02
					<option value="">
				</select>
				<select name="">
					<option value="" selected>15
					<option value="">
				</select>
				<select name="">
					<option value="" selected>30
					<option value="">
				</select>
			</td>
			<td>
				기타 : 물품종류, 사이즈, 무게
			</td>
		</tr>

		<tr>
			<th scope="row" rowspan="3">
				물품사진
			</th>
			<td>
				<input type="file" name="">
			</td>
			<th scope="row" rowspan="3">
				특이사항
			</th>
			<td rowspan="3">
				<textarea name="" rows="" cols="" class="in_w100"></textarea>
			</td>
		</tr>

		<tr>
			<td>
				<input type="file" name="">
			</td>
		</tr>
		<tr>
			<td>
				<input type="file" name="">
			</td>
		</tr>

		<tr>
			<th scope="row" rowspan="2">
				출발지
			</th>
			<td>
				<input type="text" class="in_wp300" />

				<button class="btn done" style="height: 30px;" >
					<span>주소찾기</span>
				</button>	
			</td>
			<th scope="row" rowspan="2">
				도착지
			</th>
			<td>
				<input type="text" class="in_wp300" />

				<button class="btn done" style="height: 30px;" >
					<span>주소찾기</span>
				</button>	
			</td>
		</tr>

		<tr>
			<td>
				<input type="text" class="in_wp300" />
			</td>
			<td>
				<input type="text" class="in_wp300" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				에상 거리/운임
			</th>
			<td>
				0km / 0원
			</td>
			<th scope="row">
				배송요청금액
			</th>
			<td>
				<input type="text" class="in_wp100" /> 원
			</td>
		</tr>
		<tr>
			<th scope="row">
				퀵딜맨 운임
			</th>
			<td>
				<input type="text" class="in_wp100" /> 원
			</td>
			<th scope="row">
				수수료
			</th>
			<td>
				<input type="text" class="in_wp100" /> 원
			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->

<!-- table_area -->
<div class="table_area">
	<h4 class="title">배송정보</h4>
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
				배송현황
			</th>
			<td colspan="3">
				<select name="">
					<option value="" selected>선택하기
					<option value="">매칭중
					<option value="">배송시작
					<option value="">배송중
					<option value="">배송완료
					<option value="">요청취소
					<option value="">배송취소
				</select>

				<button class="btn done" style="height: 30px;" >
					<span>변경</span>
				</button>	

			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->
<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
		</colgroup>
		<thead>
		<tr>
			<th scope="col">주문일시</th>
			<th scope="col">매칭중</th>
			<th scope="col">배송시작</th>
			<th scope="col">배송중</th>
			<th scope="col">배송완료</th>
			<th scope="col">요청취소</th>
			<th scope="col" style="color: blue;">배송취소</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>2019.02.02 15:30</td>
			<td>8명</td>
			<td>2019.02.02 15:30</td>
			<td>2019.02.02 15:30</td>
			<td></td>
			<td></td>
			<td>2019.02.02 15:30</td>
		</tr>
		</tbody>
	</table>
</div>
<!--// table 1dan list -->	


<!-- table_area -->
<div class="table_area">
	<h4 class="title">기사 정보</h4>
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 20%">
			<col style="width: 10%;">
			<col style="width: 20%">
			<col style="width: 10%;">
			<col style="width: 20%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				기사명
			</th>
			<td>
				<input type="text" class="in_wp300" />
			</td>

			<th scope="row">
				휴대폰
			</th>
			<td>
				<input type="text" class="in_wp300" />
			</td>

			<th scope="row">
				송장번호
			</th>
			<td>
				<input type="text" class="in_wp300" />
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
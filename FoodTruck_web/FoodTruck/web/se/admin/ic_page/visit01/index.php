
<div class="visit_title  ">
	지역별 거래건수
	<input type="text" name="" class="in_wp100" placeholder="">
	~
	<input type="text" name="" class="in_wp100" placeholder="">
</div>	
<div class="main_area">
	<!-- Step 1) Load D3.js -->
	<script src="https://d3js.org/d3.v5.min.js"></script>

	<!-- Step 2) Load billboard.js with style -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/billboard.js"></script>

	<!-- Load with base style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/billboard.css">

	<!-- Or load different theme style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/theme/insight.css">



	<div id="BarChart" style="margin-top: 20px;"></div>

	<script>
	var chart = bb.generate({
	  data: {
		columns: [
		["data1", 30, 200, 100, 400, 150, 350, 450, 550, 850, 050, 450, 350, 750, 350, 950, 150, 250]
		],
		type: "bar"
	  },
	  color: {
		pattern: [
		  "#0476b8"
		]
	  },
	  bar: {
		width: {
		  ratio: 0.5
		}
	  },
	  axis: {
		x: {
		  type: "category",
		  categories: [
			"서울시",
			"경기도",
			"인천시",
			"부산시",
			"대전시",
			"대구시",
			"울산시",
			"세종시",
			"고아주시",
			"강원도",
			"충청북도",
			"충청남도",
			"경상북도",
			"셩상남도",
			"전라북도",
			"전라남도",
			"제주도",
		  ]
		}
	  },
	  bindto: "#BarChart"
	});
	</script>
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
			<th>지역</th>
			<td>
				<select name="">
					<option value="" selected>시/도
					<option value="">
				</select>
				<select name="">
					<option value="" selected>구/군
					<option value="">
				</select>
				<select name="">
					<option value="" selected>동/면
					<option value="">
				</select>
			</td>
			<th>서비스</th>
			<td>
				<select name="">
					<option value="" selected>전체
					<option value="">
				</select>
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
		거래건수
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
			<th scope="col">서비스</th>
			<th scope="col">지역</th>
			<th scope="col">배송완료 건수</th>
			<th scope="col">매출 금액</th>
		</tr>
		</thead>
		<tbody>
		<?for($i = 1; $i < 18; $i++){?>
		<tr>
			<td><strong><?=$i?></strong></td>
			<td>퀵딜맨</td>
			<td>경기도 하남시 신장동</td>
			<td>56</td>
			<td>8,950,054,000</td>
		</tr>
		<?}?>
		</tbody>
	</table>
</div>
<!--// table 1dan list -->	

<!-- container -->
<div id="container" >
<article >
	<div class="content_area02" >
		<div class="location">
			<ul>
				<li>HOME</li>
				<li>
					<strong><?=$depth01_title[$ic_page]?></strong>
				</li>
			</ul>
		</div>
		<!-- content -->
		<div id="content">
			<!-- main_title -->
			<div class="main_title">
				<h3 class="title"><?=$depth01_title[$ic_page]?></h3>
			</div>
			<!-- main_title -->
			<!-- division -->
			<div class="division">
				<ul class="dashboard_area01">
					<li>
						<div class="title_txt">Today Status</div>

						<ul class="">
							<li>
								<p><img src="<?=$home_img_url?>/admin/dashicon_01.png"></p>
								<p>퀵딜맨</p>
							</li>
							<li>
								<div class="dashboard_table01">
									<table>
									<tr>
										<th>전체 주문건</th>
										<th>매칭중</th>
										<th>배송시작</th>
										<th>배송중</th>
										<th>배송완료</th>
										<th>요청취소</th>
										<th>배소취소</th>
									</tr>
									<tr>
										<td>80</td>
										<td>15</td>
										<td>12</td>
										<td>5</td>
										<td>50</td>
										<td>2</td>
										<td>2</td>
									</tr>
									</table>
								</div>								
							</li>
						</ul>
						<ul class="">
							<li>
								<p><img src="<?=$home_img_url?>/admin/dashicon_02.png"></p>
								<p>퀵서비스</p>
							</li>
							<li>
								<div class="dashboard_table01">
									<table>
									<tr>
										<th>전체 주문건</th>
										<th>매칭중</th>
										<th>배송시작</th>
										<th>배송중</th>
										<th>배송완료</th>
										<th>요청취소</th>
										<th>배소취소</th>
									</tr>
									<tr>
										<td>80</td>
										<td>15</td>
										<td>12</td>
										<td>5</td>
										<td>50</td>
										<td>2</td>
										<td>2</td>
									</tr>
									</table>
								</div>								
							</li>
						</ul>
						<ul class="">
							<li>
								<p><img src="<?=$home_img_url?>/admin/dashicon_03.png"></p>
								<p>택배</p>
							</li>
							<li>
								<div class="dashboard_table01">
									<table>
									<tr>
										<th>전체 주문건</th>
										<th>매칭중</th>
										<th>배송시작</th>
										<th>배송중</th>
										<th>배송완료</th>
										<th>요청취소</th>
										<th>배소취소</th>
									</tr>
									<tr>
										<td>80</td>
										<td>15</td>
										<td>12</td>
										<td>5</td>
										<td>50</td>
										<td>2</td>
										<td>2</td>
									</tr>
									</table>
								</div>								
							</li>
						</ul>
					</li>
					<li>
						<div class="title_txt">회원현황</div>
						<div class="dashboard_table02">
							<table>
							<tr>
								<th colspan="2">전체</th>
							</tr>
							<tr>
								<td>가입</td>
								<td>59,654</td>
							</tr>
							<tr>
								<td>탈퇴</td>
								<td>54</td>
							</tr>
							</table>
						</div>
						<div class="dashboard_table02 ">
							<table>
							<tr>
								<th colspan="2">Today</th>
							</tr>
							<tr>
								<td>가입</td>
								<td>654</td>
							</tr>
							<tr>
								<td>탈퇴</td>
								<td>0</td>
							</tr>
							</table>
						</div>
					</li>
				</ul>
				

				<div class="visit_title margint50 ">
					<strong>매출현황</strong>
					<form method="post" action="" class="float_right">
						<select name="sfl" >
							<option value="mb_id">2018년</option>
						</select>
						<select name="sfl" >
							<option value="mb_id">08월</option>
						</select>						
					</form>
				</div>	

				<div class="tab_area margint20">
					<ul class="tablist">
						<li class="on"><a href="#">전체</a></li>
						<li><a href="#">퀵딜맨</a></li>
						<li><a href="#">퀵서비스</a></li>
						<li><a href="#">택배</a></li>
					</ul>
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



					<div id="CategoryAxis" style="margin-top: 20px;"></div>

					<script>
					var chart = bb.generate({
					  data: {
						columns: [
						["전체", "3", "15", "9", "7", "1", "2", "4", "13", "11", "1", "3", "12"],
						["퀵딜맨", "1", "6", "1", "3", "7", "5", "4", "7", "4", "9", "0", "11"],
						["퀵서비스", "3", "6", "2", "1", "6", "2", "7", "9", "2", "12", "6", "11"],
						["택배", "14", "8", "54", "4", "9", "45", "13", "4", "18", "12", "13", "4"]
						],
					  },
					  color: {
						pattern: [
						  "#0070c0",
						  "#ed7d31",
						  "#7f7f7f",
						  "#db2321"
						]
					  },
					  axis: {
						x: {
						  type: "category",
						  categories: [
							"01/04",
							"01/05",
							"01/06",
							"01/07",
							"01/08",
							"01/09",
							"01/10",
							"01/11",
							"01/12",
							"01/13",
							"01/14",
							"01/15",
						  ]
						}
					  },
					  bindto: "#CategoryAxis"
					});
					</script>
				</div>	

			</div>
			<!--// division -->
		</div>
		<!--// content -->
	</div>
</article>	
</div>
<!-- //container -->
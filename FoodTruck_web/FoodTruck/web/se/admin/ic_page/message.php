<!-- container -->
<div id="container">
<article>
	<div class="content_area02">
		<?
		include $admin_ic_page_include_path."/page_location.php";
		?>
		<!-- content -->
		<div id="content">
			<!-- main_title -->
			<div class="main_title">
				<h3 class="title">
					<?if($ic_sub_page != ''){?>
						<li>
							<?=$depth02_title[$ic_sub_page]?>
						</li>
					<?} else {?>
						<li>
							<?=$depth01_title[$ic_page]?>
						</li>
					<?}?>				
				</h3>
			</div>
			<!-- main_title -->
			<!-- division -->
			<div class="division">
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
							<th>발송일</th>
							<td>
								<input type="text" name="" class="in_wp100" placeholder="">
								~
								<input type="text" name="" class="in_wp100" placeholder="">
							</td>
							<th>검색</th>
							<td>
								<input type="text" name="" class="in_w100" placeholder="보낸사람이름, 받는사람이름">
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
				</div>
				<!--// button_area -->

				<!-- table 1dan list -->
				<div class="table_area">
					<table class="list fixed">
						<caption>게시판 관리 리스트 화면</caption>
						<colgroup>
							<col style="width: 5%;">
							<col style="width: 10%;">
							<col style="width: 10%;">
							<col style="width: 10%;">
							<col style="width: 50%;">
						</colgroup>
						<thead>
						<tr>
							<th scope="col">NO</th>
							<th scope="col">발송일시</th>
							<th scope="col">보낸사람</th>
							<th scope="col">받는사람</th>
							<th scope="col">메시지 내용</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>5</td>
							<td>
								2018-10-10 15:32
							</td>
							<td>이름</td>
							<td>이름</td>
							<td class="alignl">
								<a href="javascript:;" onclick="$('.l_pop01').show();">메시지내용</a>
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

				
			</div>
			<!--// division -->
		</div>
		<!--// content -->
	</div>
</article>	
</div>
<!-- //container -->



<div class="layer_pop l_pop01" style="display: none;">
	<div>
		<div class="title_txt">
			메시지보기
			<a href="javascript:;" onclick="$('.l_pop01').hide();" class="pop_close" title="페이지 닫기">
				<span>닫기</span>
			</a>			
		</div>
		<div class="comment_txt">
			<p><strong>이름</strong> 2018-12-12 15:30</p>
			<textarea name="comment" rows="" cols="" class="in_w100">안녕하세요. 8282배송해줘요~</textarea>
		</div>

		<!-- button_area -->
		<div class="button_area">
			<div class="alignc">
				<button type="button" class="btn cancel" title="취소하기" onclick="$('.l_pop01').hide();">
					<span>닫기</span>
				</button>
			</div>
		</div>
		<!--// button_area -->			
	</div>
</div>

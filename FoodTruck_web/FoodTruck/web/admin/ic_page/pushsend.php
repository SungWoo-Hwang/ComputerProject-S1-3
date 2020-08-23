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

				<form method="post" action="<?=$home_admin_proc_url?>/push_list_write.php" name="board_form" onsubmit="return board_func();" enctype="multipart/form-data">
					<input type="hidden" name="ic_page" value="<?=$ic_page?>">
					<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">


					<!-- search_area -->
					<div class="search_area">
						<table class="search_box">
							<caption>통합검색 화면</caption>
							<colgroup>
								<col style="width: 120px;" />
								<col style="width: *;" />
							</colgroup>
							<tbody>
							<tr>
								<th>발송내용</th>
								<td>
									<textarea name="comment" rows="" cols="" class="in_w100" placeholder="알림 메시지를 입력하세요." ></textarea>
								</td>
							</tr>

							</tbody>
						</table>
						<div class="search_area_btnarea alignc margint10">
							<button class="btn sch" title="조회하기">
								<span>보내기</span>
							</button>
						</div>
					</div>
					<!--// search_area -->

				</form>

				<script type="text/javascript">
				<!--

				function board_func(){
					var f = document.board_form;


					if(f.comment.value == ""){
						alert("내용을 입력해주세요.");
						f.comment.focus();
						return false;
					}

					if(confirm('푸쉬발송을 하시겠습니까?')){
						return true;	
					} else {
						return false;
					}


				}
				//-->
				</script>

				<!-- button_area -->
				<div class="button_area02">
					<div class="float_left">
						발송내역
					</div>
				</div>
				<!--// button_area -->

				<?
				if(!$start)$start=0;
				if($list_view_account ==""){
					$list_view_account = "15";
				}
				$scale = $list_view_account;
				$pagescale = "1";
				$limit= $list_view_account;

				$page_start = $start * $scale;

				$que_where = "";
				if($qus_type != ''){
					$que_where .= "";
				}
				if($use_type != ''){
					$que_where .= "";
				}



				$count_que = "select count(idx) from ".$TBA['PUST_LIST']." Where (1) $que_where";
				$result_count = mysql_query($count_que);
				$total = mysql_fetch_array($result_count);
				$total = $total[0];
				$format_total = number_format($total);

				$list_que = "select * from ".$TBA['PUST_LIST']." where (1) $que_where order by idx desc limit $page_start,$scale";
				$result_list = mysql_query($list_que);
				$s_total = mysql_affected_rows();

				?>

				<!-- table 1dan list -->
				<div class="table_area">
					<table class="list fixed">
						<caption>게시판 관리 리스트 화면</caption>
						<colgroup>
							<col style="width: 5%;">
							<col style="width: 10%;">
							<col style="width: 50%;">
						</colgroup>
						<thead>

						<tr>
							<th scope="col">NO</th>
							<th scope="col">발송일자</th>
							<th scope="col">발송내용</th>
						</tr>
						</thead>
						<tbody>

						<?
						$i=0;
						while($row = mysql_fetch_array($result_list)){
							$virtual_num = $total-$i-$start;
						?>

						<tr>
							<td><?=$virtual_num?></td>
							<td><?=$row['signdate_datetime']?></td>
							<td class="alignl">
								<?=$row['comment']?>
							</td>
						</tr>

						<?
						$i++;
						}
						?>

						<?if($i == 0){?>
						<tr height="100">
							<td colspan="3">데이터가 없습니다.</td>
						</tr>
						<?}?>

						</tbody>
					</table>
				</div>
				<!--// table 1dan list -->	

				<!-- paging_area -->
				<?
				paging_func();
				?>
				<!--// paging_area -->	

				
			</div>
			<!--// division -->
		</div>
		<!--// content -->
	</div>
</article>	
</div>
<!-- //container -->


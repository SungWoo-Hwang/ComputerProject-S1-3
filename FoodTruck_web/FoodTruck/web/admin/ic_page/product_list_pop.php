<?
include "../../common.php";
include $admin_path."/admin.common.php";
$header_data = false;
$left_no = "left_no";
$layout_no = "no";
include $admin_path."/header.sub.php";


if($ic_page != "login" && $member['idx'] == ""){
	alert("로그인 후 이용해주세요.", $admin_url);
}


?>
	<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/popup.css" />

		<!-- header -->
		<div id="header">
		<header>
			<h1 class="title">상품불러오기</h1>
			<a href="javascript:;" onclick="window.close();" class="pop_close" title="페이지 닫기">
				<span>닫기</span>
			</a>
		</header>
		</div>
		<!-- //header -->
		<!-- container -->
		<div id="container">
		<article>
			<div class="content_area">
				<div id="content">
					<!-- division -->
					<div class="division">

						<?
						if(!$start)$start=0;
						if($list_view_account ==""){
							$list_view_account = "20";
						}
						$scale = $list_view_account;
						$pagescale = "1";
						$limit= $list_view_account;

						$page_start = $start * $scale;

						$que_where = "";

						if ($cate1) {
							$que_where .= " and ( cate1 = '".$cate1."' ) ";
						}
						if ($cate2) {
							$que_where .= " and ( cate2 = '".$cate2."' ) ";
						}
						if ($cate3) {
							$que_where .= " and ( cate3 = '".$cate3."' ) ";
						}
						$orderby = "idx";

						$count_que = "select count(idx) from ".$TBA['PRODUCT_TABLE']." Where (1) $que_where $que_where02";
						$result_count = mysql_query($count_que);
						$total = mysql_fetch_array($result_count);
						$total = $total[0];
						$format_total = number_format($total);

						$list_que = "select * from ".$TBA['PRODUCT_TABLE']." where (1) $que_where $que_where02 order by ".$orderby." desc limit $page_start,$scale";
						$result_list = mysql_query($list_que);
						$s_total = mysql_affected_rows();

						?>



						<form method="get" name="search_form" action="<?=$PHP_SELF?>" onsubmit="return search_func();">
						<input type="hidden" name="ic_page" value="<?=$ic_page?>">
						<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
						<input type="hidden" name="ic_page_tab" id="orderby" value="">

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
										<th>카테고리</th>
										<td>
											<select name="cate1">
												<option value="" selected>대분류
												<?
												$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU1') order by idx asc";
												$ca1_result = mysql_query($ca1_query);
												while($ca1_row = mysql_fetch_array($ca1_result)){
												?>						
												<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $cate1){?>selected<?}?>><?=$ca1_row['REFNM']?>
												<?}?>
											</select>
											<select name="cate2">
												<option value="" selected>중분류
												<?
												$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU2') order by idx asc";
												$ca1_result = mysql_query($ca1_query);
												while($ca1_row = mysql_fetch_array($ca1_result)){
												?>						
												<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $cate2){?>selected<?}?>><?=$ca1_row['REFNM']?>
												<?}?>
											</select>
											<select name="cate3">
												<option value="" selected>소분류
												<?
												$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU3') and REFNM != '' order by idx asc";
												$ca1_result = mysql_query($ca1_query);
												while($ca1_row = mysql_fetch_array($ca1_result)){
												?>						
												<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $cate3){?>selected<?}?>><?=$ca1_row['REFNM']?>
												<?}?>
											</select>
										</td>
									</tr>
									</tbody>
								</table>
								<div class="search_area_btnarea alignc margint10">
									<button class="btn sch" title="조회하기">
										<span>검색</span>
									</button>
								</div>
							</div>
							<!--// search_area -->

						<!--// search_area -->
						</form>

						<!-- table 1dan list -->
						<div class="table_area">
							<table class="list fixed">
								<caption>게시판 관리 리스트 화면</caption>
								<colgroup>
									<col style="width: 5%;">
									<col style="width: 10%;">
									<col style="width: 40%;">
									<col style="width: 10%;">
								</colgroup>
								<thead>
								<tr>
									<th scope="col">NO</th>
									<th scope="col">이미지</th>
									<th scope="col">제목</th>
									<th scope="col">상품선택</th>
								</tr>
								</thead>
								<tbody>
								<?
								$i=0;
								while($row = mysql_fetch_array($result_list)){
									$virtual_num = $total-$i-$start;
									$cate1_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU1' and REFCD='".$row['cate1']."'" );
									$cate2_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU2' and REFCD='".$row['cate2']."'" );
									$cate3_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU3' and REFCD='".$row['cate3']."'" );
								?>

								<tr>
									<td><?=$virtual_num?></td>
									<td><img src="<?=$row['list_file']?>" onerror="this.src='./images/common/no_img.png'" width="100"></td>
									<td class="alignl">
											<strong><?=$row['wr_subject']?></strong>
										<p><?=$cate1_row['REFNM']?> > <?=$cate2_row['REFNM']?> > <?=$cate3_row['REFNM']?></p>
									</td>
									<td>
										<a class="btn save" href="javascript:;" onclick="product_selecter('<?=$sid?>', '<?=$row['list_file']?>');">
											선택
										</a>
									</td>
								</tr>

								<?
								$i++;
								}
								?>

								<?if($i == 0){?>
								<tr height="100">
									<td colspan="4">데이터가 없습니다.</td>
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

						<script type="text/javascript">
						<!--
						function product_selecter(sid, pic_url){
							opener.parent.img_src_func(sid, pic_url);
							window.close();
						}
						//-->
						</script>

					</div>
					<!--// division -->
					
				</div>
			</div>
		</article>	
		</div>
		<!-- //container -->
<?
include $admin_path."/tail.php";
?>

<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "20";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

$que_where = " and ( store_code = '".$member['store_code']."' ) ";
if ($sdate) {
	$que_where .= " and ( a.product_signdate_time >= '".$sdate." 00:00:00' ) ";
}
if ($edate) {
	$que_where .= " and ( a.product_signdate_time <= '".$edate." 23:59:59' ) ";
}

if ($search_val) {
	$que_where .= " and ( a.product_name like '%".$search_val."%' ) ";
}

if ($cate1) {
	$que_where .= " and ( a.cate1 = '".$cate1."' ) ";
}
if ($cate2) {
	$que_where .= " and ( a.cate2 = '".$cate2."' ) ";
}
if ($cate3) {
	$que_where .= " and ( a.cate3 = '".$cate3."' ) ";
}

if($ic_page_tab != ""){
	$orderby = "b.".$ic_page_tab;
} else {
	$orderby = "b.idx";
}



$total = sql_fetch( "
select count(c.idx) as cnt
from (
	select a.idx from ".$TBA['PRODUCT_WISH']." a, ".$TBA['PRODUCT_TABLE']." b where (1) and a.product_idx = b.idx $que_where group by a.product_idx
) as c
" );


$total = $total['cnt'];
$format_total = number_format($total);

$list_que = "
select 
a.*, a.idx widx, b.idx, b.like_count, b.wish_count, b.view_count, b.list_file
from ".$TBA['PRODUCT_WISH']." a, ".$TBA['PRODUCT_TABLE']." b where (1) and a.product_idx = b.idx $que_where group by a.product_idx order by ".$orderby." desc limit $page_start,$scale";
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
				<col style="width: 120px;" />
				<col style="width: *;" />
			</colgroup>
			<tbody>
			<tr>
				<th>상품등록일</th>
				<td>
					<input type="text" name="sdate" value="<?php echo $sdate ?>" id="sdate" class="in_wp100" placeholder="">
					~
					<input type="text" name="edate" value="<?php echo $edate ?>" id="edate" class="in_wp100" placeholder="">

					<script>
					$(function(){
						$("#sdate, #edate").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99" });
					});
					</script>
				</td>
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
			<tr>
				<th>상품명</th>
				<td>
					<input type="text" name="search_val" value="<?=$search_val?>" class="in_w100" >
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
</form>


<!-- button_area -->
<div class="button_area02">
	검색결과 <font color="blue"><strong><?=$format_total?></strong></font>

	<div class="float_right">
		<button class="btn <?if($ic_page_tab == "" || $ic_page_tab == "idx"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('idx');document.search_form.submit();">
			<span>등록일순</span>
		</button>
		<button class="btn <?if($ic_page_tab == "view_count"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('view_count');document.search_form.submit();">
			<span>조회순</span>
		</button>
		<button class="btn <?if($ic_page_tab == "like_count"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('like_count');document.search_form.submit();">
			<span>좋아요순</span>
		</button>
		<button class="btn <?if($ic_page_tab == "wish_count"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('wish_count');document.search_form.submit();">
			<span>위시순</span> 
		</button>
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
			<col style="width: 50%;">
			<col style="width: 25%;">
			<col style="width: 7%;">
			<col style="width: 7%;">
			<col style="width: 7%;">
			<col style="width: 12%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">이미지</th>
			<th scope="col">제목</th>
			<th scope="col">카테고리</th>
			<th scope="col">조회수</th>
			<th scope="col">좋아요</th>
			<th scope="col">위시</th>
			<th scope="col">등록일</th>
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
				<a href="<?=$link_url?>&pt=view&vidx=<?=$row['widx']?>">
					<strong><?=$row['product_name']?></strong>
				</a>
			</td>
			<td><?=$cate1_row['REFNM']?> > <?=$cate2_row['REFNM']?> > <?=$cate3_row['REFNM']?></td>
			<td><?=number_format($row['view_count'])?></td>
			<td><?=number_format($row['like_count'])?></td>
			<td><?=number_format($row['wish_count'])?></td>
			<td><?=$row['product_signdate_time']?></td>
		</tr>
		<?
		$i++;
		}
		?>

		<?if($i == 0){?>
		<tr height="100">
			<td colspan="8">데이터가 없습니다.</td>
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

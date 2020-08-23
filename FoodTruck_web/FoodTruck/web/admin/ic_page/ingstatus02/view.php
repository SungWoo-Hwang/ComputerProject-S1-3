<?
$row = sql_fetch( "select * from ".$TBA['PRODUCT_WISH']." where idx='".$vidx."'" );
$product = sql_fetch( "select * from ".$TBA['PRODUCT_TABLE']." where idx='".$row['product_idx']."'" );

$cate1_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU1' and REFCD='".$row['cate1']."'" );
$cate2_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU2' and REFCD='".$row['cate2']."'" );
$cate3_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU3' and REFCD='".$row['cate3']."'" );

?>

<!-- button_area -->
<div class="">
	<div class="alignr">
		<a href="<?=$link_url?>=<?=$ic_page?>&ic_sub_page=<?=$ic_sub_page?>" class="btn list" title="목록 페이지로 이동">
			<span>목록</span>
		</a>
	</div>
</div>
<!--// button_area -->

<div class="tab_area margint10">
	<ul class="tablist">
		<li class="on"><a href="<?=$link_url?>&pt=view&vidx=<?=$vidx?>">위시고객</a></li>
		<li ><a href="<?=$link_url?>&pt=write&vidx=<?=$vidx?>">상품정보</a></li>
	</ul>
</div>



<!-- table_area -->
<div class="table_area">
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%">
			<col style="width: 90%">
		</colgroup>
		<tbody>

		<tr>
			<td rowspan="3">
				<img src="<?=$product['list_file']?>" onerror="this.src='./images/common/no_img.png'" width="100">
			</td>
			<td>
				<strong style="font-size: 20px;"><?=$row['product_name']?></strong>
			</td>
		</tr>
		<tr>
			<td>
				<strong><?=$cate1_row['REFNM']?> > <?=$cate2_row['REFNM']?> > <?=$cate3_row['REFNM']?></strong>
			</td>
		</tr>
		<tr>
			<td>
				<?=$product['signdate_datetime']?>
			</td>
		</tr>
		</tbody>
	</table>

</div>
<!--// table_area -->


<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "20";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

$que_where = " and ( product_idx='".$product['idx']."' ) ";


if ($search_val) {
	$que_where .= " and ( mb_name like '%".$search_val."%' ) ";
}

if ($store_code) {
	$que_where .= " and ( store_code = '".$store_code."' ) ";
}


$count_que = "select count(idx) from ".$TBA['PRODUCT_WISH']." Where (1) $que_where $que_where02";
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['PRODUCT_WISH']." where (1) $que_where $que_where02 order by idx desc limit $page_start,$scale";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();

?>

<!-- button_area -->
<div class="button_area02 margint30">
	<strong>위시고객</strong> <font color="blue"><strong><?=$format_total?></strong></font>

	<!-- <div class="float_right">
		<button class="btn homepage" title="저장하기">
			<span>엑셀다운로드</span>
		</button>
	</div> -->

</div>
<!--// button_area -->

<form method="get" name="search_form" action="<?=$PHP_SELF?>" onsubmit="return search_func();">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
<input type="hidden" name="pt" value="<?=$pt?>">
<input type="hidden" name="vidx" value="<?=$vidx?>">

	<!-- search_area -->
	<div class="search_area" style="margin-bottom: 10px;">
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
				<th>위시한 매장고객</th>
				<td>
					<select name="store_code">
						<option value="" selected>전체
						<?
						$store_query = "select * from ".$TBA['STORE_TABLE']." where store_code != 'admin' order by idx asc";
						$store_result = mysql_query($store_query);
						while($store_row = mysql_fetch_array($store_result)){
						?>						
						<option value="<?=$store_row['store_code']?>" <?if($store_row['store_code'] == $store_code){?>selected<?}?>><?=$store_row['store_name']?>
						<?}?>
					</select>
				</td>
				<th>고객명</th>
				<td>
					<input type="text" name="search_val" value="<?=$search_val?>" class="in_w100" >
				</td>
				<td>
					<button class="btn sch" title="조회하기">
						<span>검색</span>
					</button>
				</td>
			</tr>

			</tbody>
		</table>
	</div>
	<!--// search_area -->
</form>

<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed margint10">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 5%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">매장명</th>
			<th scope="col">고객명</th>
			<th scope="col">위시일자</th>
		</tr>
		</thead>
		<tbody>
		<?
		$i=0;
		while($wrow = mysql_fetch_array($result_list)){
			$virtual_num = $total-$i-$start;
			$store = sql_fetch( "select store_name from ".$TBA['STORE_TABLE']." where store_code='".$wrow['store_code']."'" );

		?>
		<tr>
			<td><?=$virtual_num?></td>
			<td><?=$store['store_name']?></td>
			<td><?=$wrow['mb_name']?></td>
			<td><?=$wrow['signdate_datetime']?></td>
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

<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "15";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

$que_where = "and ( abort_type = '0') and ( blacklist_type = '0') and ( store_code = '".$member['store_code']."' ) ";

if ($sdate) {
	$que_where .= " and ( signdate_datetime >= '".$sdate." 00:00:00' ) ";
}
if ($edate) {
	$que_where .= " and ( signdate_datetime <= '".$edate." 23:59:59' ) ";
}

if ($search_val) {
	$que_where .= " and ( mb_name like '%".$search_val."%' or mb_id like '%".$search_val."%' ) ";
}


$count_que = "select count(idx) from ".$TBA['MEM_TABLE']." Where (1) $que_where";
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['MEM_TABLE']." where (1) $que_where order by idx desc limit $page_start,$scale";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();

?>

<form method="get" name="search_form" action="<?=$PHP_SELF?>" onsubmit="return search_func();">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
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
			<th>가입일</th>
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
			<th>검색</th>
			<td>
				<input type="text" name="search_val" value="<?=$search_val?>" class="in_w100" placeholder="이름, 휴대폰">
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
	<div class="float_left">
		검색결과 <font color="blue"><strong><?=$format_total?></strong></font>
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
			<col style="width: 10%;">
			<col style="width: 5%;">
			<col style="width: 8%;">
			<col style="width: 8%;">
			<col style="width: 50%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">가입일</th>
			<th scope="col">이름</th>
			<th scope="col">휴대폰</th>
			<th scope="col">매장</th>
			<th scope="col">주소</th>
		</tr>
		</thead>
		<tbody>

		<?
		$i=0;
		while($row = mysql_fetch_array($result_list)){
			$virtual_num = $total-$i-$start;
			$store = sql_fetch( "select * from ".$TBA['STORE_TABLE']." where store_code='".$row['store_code']."'" );
			//comment
		?>


		<tr>
			<td><?=$virtual_num?></td>
			<td><?=$row['signdate_datetime']?></td>
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write&w=u&vidx=<?=$row['idx']?>">
					<?=$row['mb_name']?>
				</a>
			</td>
			<td><?=$row['mb_id']?></td>
			<td><?=$store['store_name']?></td>
			<td><?=$row['mb_addr']?> <?=$row['mb_addr_detail']?></td>
		</tr>

		<?
		$i++;
		}
		?>

		<?if($i == 0){?>
		<tr height="100">
			<td colspan="6">데이터가 없습니다.</td>
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

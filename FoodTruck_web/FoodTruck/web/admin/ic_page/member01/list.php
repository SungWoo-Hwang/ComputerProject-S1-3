<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "15";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

$que_where = "and ( login_type = 0) ";

if ($sdate) {
	$que_where .= " and ( signdate_datetime >= '".$sdate." 00:00:00' ) ";
}
if ($edate) {
	$que_where .= " and ( signdate_datetime <= '".$edate." 23:59:59' ) ";
}
if ($store_code) {
	$que_where .= " and ( store_code = '".$store_code."' ) ";
}



$count_que = "select count(KEYINDEX) from mem_tb Where (1) AND SHOP_KEEPER != 'CUSTOMER' $que_where order by KEYINDEX desc";
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);
//echo $count_que;

$list_que = "select * from mem_tb where SHOP_KEEPER != 'CUSTOMER' order by KEYINDEX";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();
//echo $list_que;
?>

<form method="get" name="search_form" action="<?=$PHP_SELF?>" onsubmit="return search_func();">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">

</form>
<!-- 
<form name="fmemberlist" id="fmemberlist" action="<?=$home_admin_proc_url?>/member_update.php" method="post">
-->
<form name="fmemberlist" id="fmemberlist" action="<?=$home_admin_proc_url?>/member_update.php" method="post">

<input type="hidden" name="act_button" id="act_button" value="">
<input type="hidden" name="w" value="list_update">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">


<!-- button_area -->
<div class="button_area02">
	<button type="button" class="btn list" onclick="confirm_pop('승인','abort_back', 'abort_back_ok');">
		<span>승인</span>
	</button>
	<button type="button" class="btn list" onclick="confirm_pop('사용중지','delete', 'form_delete');">
		<span>사용중지</span>
	</button>
	<button type="button" class="btn list" onclick="confirm_pop('탈퇴','rel_delete', 'rel_form_delete');">
		<span>탈퇴</span>
	</button>
	
	

</div>
<!--// button_area -->
<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 3%;">
			<col style="width: 10%;">
			<col style="width: 15%;">
			<col style="width: 10%;">
			<col style="width: 5%;">
			<col style="width: 15%;">
			<col style="width: 3%;">

		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
			</th>
			<th scope="col">NO</th>
			<th scope="col">아이디</th>
			<th scope="col">이름</th>
			<th scope="col">폰번호</th>
			<th scope="col">이메일</th>
			<th scope="col">주소</th>
			<th scope="col">승인여부</th>

	
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
			<td>
				<input type="hidden" name="idx[<?php echo $i ?>]" value="<?php echo $row['KEYINDEX'] ?>" id="mb_id_<?php echo $i ?>">
				<input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
			</td>
			<td><?=$i+1?></td>
			<td>
				<?=$row['ID']?>
			</td>
			<td><?=$row['NAME']?></td>
			<td><?=$row['PHONE']?></td>
			<td><?=$row['EMAIL']?></td>
			<td><?=$row['ADDRESS']?></td>
			<td><?=$row['KEEPER_YN']?></td>

			
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
</form>
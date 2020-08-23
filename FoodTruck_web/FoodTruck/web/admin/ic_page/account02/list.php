<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "15";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

if($search_val != ''){
	$que_where = "";
}
if($search_sel != ''){
	$que_where02 = "";
}
//$query = "select * from ".$TBA['JY_REQUEST']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.request_id = B.key_index";


$count_que = "select * from ".$TBA['JY_ACCOUNT']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index Where (1) $que_where $que_where02";
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['JY_ACCOUNT']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index where (1) $que_where $que_where02 and A.status=1 order by date desc limit $page_start,$scale ";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();
//echo $list_que;
?>




<form name="fmemberlist" id="fmemberlist" action="<?=$home_admin_proc_url?>/account_update.php" method="post">

<input type="hidden" name="act_button" id="act_button" value="">
<input type="hidden" name="w" value="list_delete">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">

<!-- button_area -->
<div class="button_area02">
	<button type="button" class="btn list" onclick="confirm_pop('삭제','accountd', 'account_del');">
		<span>삭제하기</span>
	</button>
</div>
<!--// button_area -->



<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 20%;">
			<col style="width: 20%;">
			<col style="width: 15%;">
			<col style="width: 17%;">
			<col style="width: 15%;">
            <col style="width: 15%;">
            <col style="width: 15%;">
            <col style="width: 10%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
			</th>
<!-- 1. 아이디 / 대표자명 / 업체상호명 / 결제요청일 / 사용만료일 / 전화번호 / 요청은행 -->
			<th scope="col">아이디</th>
			<th scope="col">대표자명</th>
			<th scope="col">업체상호명</th>
			<th scope="col">결제요청일</th>
			<th scope="col">사용만료일</th>
            <th scope="col">전화번호</th>
            <th scope="col">요청은행</th>
            <th scope="col">승인관리자<th>
		</tr>
		</thead>
		<tbody>

		<?
		$i=0;
		while($row = mysql_fetch_array($result_list)){
			$virtual_num = $total-$i-$start;
		?>

		<tr>
			<td>
				<input type="hidden" name="idx[<?php echo $idx ?>]" value="<?php echo $row['idx'] ?>" id="mb_id_<?php echo $i ?>">
				<input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
			</td>
			<td><?=$row['id']?></td>
			<td><?=$row['name']?></td>
			<td><?=$row['name_sub']?></td>
			<td><?=$row['date']?></td>
			<td><?=$row['use_y_date']?></td>
            <td><?=$row['phone_number']?></td>
            <td><?=$row['account_name']?></td>
			<td><?=$row['reg_admin']?></td></th>
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

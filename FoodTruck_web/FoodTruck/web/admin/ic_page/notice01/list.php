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



$count_que = "select count(key_index) from ".$TBA['JY_NOTICE']." Where type = 0 and (1) $que_where $que_where02";
//echo $count_que;
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['JY_NOTICE']." where type = 0 and (1) $que_where $que_where02 order by key_index desc limit $page_start,$scale";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();

?>

<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<button class="btn save linkbutton" title="등록" ldata="<?=$link_url?>&pt=write">
			<span>등록</span>
		</button>
	</div>
</div>
<!--// button_area -->



<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 70%;">
			<col style="width: 20%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">타이틀</th>
			<th scope="col">등록일</th>
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
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write&vidx=<?=$row['key_index']?>&w=u">
					<?=$row['title']?>
				</a>
			</td>
			<td><?echo $row['date'];?></td>
			
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

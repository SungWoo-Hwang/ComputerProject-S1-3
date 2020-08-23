<?
$year = date('Y');
$month = date('m');
$day = date('d');

//echo date("Y년m월d일", mktime( 0, 0, 0, $month, $day+7, $year ))."<br>\n";
//echo date("Y-m-d", mktime( 0, 0, 0, $month, $day-7, $year ))."<br>\n"; 
//echo $vidx;
//echo "select count(*) as count from ".$TBA['JY_HISTORY']." where date like '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day, $year ))."%' and request_id=".$vidx."";
//SELECT count(*) as count FROM `jy_request_history` LIMIT 0, 30
$row = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day, $year ))."%' and request_id=".$vidx." " );
$row1 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-1, $year ))."%' and request_id=".$vidx." " );
$row2 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-2, $year ))."%' and request_id=".$vidx." " );
$row3 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-3, $year ))."%' and request_id=".$vidx." " );
$row4 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-4, $year ))."%' and request_id=".$vidx." " );
$row5 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-5, $year ))."%' and request_id=".$vidx." " );
$row6 = sql_fetch( "select count(*) as count from ".$TBA['JY_HISTORY']." where date like  '%".date("Y-m-d", mktime( 0, 0, 0, $month, $day-6, $year ))."%' and request_id=".$vidx." " );


//$proc_url = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=abort&didx=".$row['idx'];
//$proc_url2 = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=black&didx=".$row['idx'];

?>




<form method="post" name="store_form" action="<?=$home_admin_proc_url?>/member_update.php" enctype="multipart/form-data">

<!-- table_area -->
<div class="table_area">
	<h4 class="title">요청 내역</h4>
	<table class="view1">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%">
			<col style="width: 10%">
		</colgroup>
		<tbody>

		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day, $year ))?>
			</th>
			<td>
				<?=$row['count']?>
			</td>
			
		</tr>


		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-1, $year ))?>
			</th>
			<td>
				<?=$row1['count']?>
			</td>
			
		</tr>
		
		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-2, $year ))?>
			</th>
			<td>
				<?=$row2['count']?>
			</td>
			
		</tr>
		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-3, $year ))?>
			</th>
			<td>
				<?=$row3['count']?>
			</td>
			
		</tr>
		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-4, $year ))?>
			</th>
			<td>
				<?=$row4['count']?>
			</td>
			
		</tr>
		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-5, $year ))?>
			</th>
			<td>
				<?=$row5['count']?>
			</td>
			
		</tr>
		
		<tr>
			<th scope="row">
				<?=date("Y-m-d", mktime( 0, 0, 0, $month, $day-6, $year ))?>
			</th>
			<td>
				<?=$row6['count']?>
			</td>
			
		</tr>
		
		
		
		</tbody>
	</table>

</div>
<!--// table_area -->


<!-- button_area -->
<div class="button_area">
	<div class="alignc2">
		<a href="javascript:history.go(-1);" class="btn list" title="목록 페이지로 이동">
			<span>목록</span>
		</a>
		
	</div>
</div>
<!--// button_area -->

</form>
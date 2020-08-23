<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "20";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;


if($ic_page_tab != ""){
	$orderby = $ic_page_tab;
} else {
	$orderby = "key_index";
}

$count_que = "select count(key_index) from ".$TBA['JY_MEMBER']." Where (1) $que_where $que_where02 and ing_status = 1 and login_type = 0";
//echo $count_que;
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
//echo $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['JY_MEMBER']." where (1) $que_where $que_where02 and ing_status = 1 and login_type = 0 order by key_index desc limit $page_start,$scale";
$result_list = mysql_query($list_que);
$s_total = mysql_affected_rows();

?>



<script type="text/javascript">
<!--
function product_add_func(){
	$('.l_pop01').show();
	$.get( "<?=$home_url?>/product_get.php", function(jqXHR) {
		$('.l_pop01').hide();
		$('.l_pop02').show();
	}, 'text' /* xml, text, script, html */)
	.fail(function(jqXHR) {
		alert( "error" );
		return;
		$('.l_pop01').hide();
	});
}
//-->
</script>

<form method="get" name="search_form" action="<?=$PHP_SELF?>" onsubmit="return search_func();">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
<input type="hidden" name="ic_page_tab" id="orderby" value="">

	<!-- search_area 
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
				<th>고객명</th>
				<td class="in_w100">
					<input type="text" name="search_val" value="<?=$search_val?>" class="in_w100" >
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
	-->
	<!--// search_area -->

<!--// search_area -->
</form>

<form name="fmemberlist" id="fmemberlist" action="<?=$home_admin_proc_url?>/product_write.php" method="post">
<input type="hidden" name="w" id="act_button" value="">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">


 
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
			<col style="width: 10%;">
			<col style="width: 10%;">
			<col style="width: 5%;">
			
		</colgroup>
		<thead>
		<tr>
			
			<th scope="col">NO</th>
			<th scope="col">아이디</th>
			<th scope="col">사업자명</th>
			<th scope="col">업체상호명</th>
			<th scope="col">가입일</th>
			<th scope="col">요청카운트</th>
			<th scope="col">승인여부</th>
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
			<td>
				<a href="<?=$link_url?>&pt=member_update&accesse_yn=<?=$row['accesse_yn']?>&vidx=<?=$row['key_index']?>">
					<?=$row['id']?>
				</a>
			</td>
			<td><?=$row['name']?></td>
			<td><?=$row['name_sub']?></td>
			<td><?=$row['signdate']?></td>
			<td><?=$row['count']?></td>
			<td><?
					if($row['ing_status'] == "0"){
						echo "접속하지 않음";
					} else {
						echo "접속중";
					} 
		
				?></td>
			
		</tr>

		<?
		$i++;
		}
		?>

		<?if($i == 0){?>
		<tr height="100">
			<td colspan="10">데이터가 없습니다.</td>
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

<div class="layer_pop l_pop01" style="display: none;">
	<div>
		<div class="comment_txt alignc">
			<p class="alignc">상품정보 업데이트중</p>
		</div>

		<!-- button_area -->
		<div class="button_area">
			<div class="alignc">
				<i class="fas fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i>
			</div>
		</div>
		<!--// button_area -->		

	</div>
</div>


<div class="layer_pop l_pop02" style="display: none;">
	<div>
		<div class="comment_txt alignc">
			<p class="alignc">상품정보 업데이트 완료</p>
		</div>

		<!-- button_area -->
		<div class="button_area">
			<div class="alignc">
				<button class="btn save" onclick="$( '.l_pop02' ).hide();">
					<span>완료</span>
				</button>
			</div>
		</div>
		<!--// button_area -->			
	</div>
</div>




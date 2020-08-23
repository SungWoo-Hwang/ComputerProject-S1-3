<?
if(!$start)$start=0;
if($list_view_account ==""){
	$list_view_account = "10";
}
$scale = $list_view_account;
$pagescale = "1";
$limit= $list_view_account;

$page_start = $start * $scale;

$que_where = " and ( store_code = '".$member['store_code']."' ) ";
if ($sdate) {
	$que_where .= " and ( signdate_datetime >= '".$sdate." 00:00:00' ) ";
}
if ($edate) {
	$que_where .= " and ( signdate_datetime <= '".$edate." 23:59:59' ) ";
}


if ($view_type) {
	$que_where .= " and ( status = '".($view_type=='1'?"0":"1")."' ) ";
}


if($ic_page_tab != ""){
	$orderby = $ic_page_tab;
} else {
	$orderby = "idx";
}

$count_que = "select count(idx) from ".$TBA['TIMELINE']." Where (1) $que_where $que_where02";
$result_count = mysql_query($count_que);
$total = mysql_fetch_array($result_count);
$total = $total[0];
$format_total = number_format($total);

$list_que = "select * from ".$TBA['TIMELINE']." where (1) $que_where $que_where02 order by ".$orderby." desc limit $page_start,$scale";
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
				<th>등록(수정)일</th>
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
				<th>게재상태</th>
				<td>
					<input type="radio" name="view_type" value="" id="view_type1" checked> <label for="view_type1">전체</label>　　
					<input type="radio" name="view_type" value="1" id="view_type2" <?if($view_type == "1"){?>checked<?}?>> <label for="view_type2">게재중</label>　　
					<input type="radio" name="view_type" value="2" id="view_type3" <?if($view_type == "2"){?>checked<?}?>> <label for="view_type3">게재종료</label>　　
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

<form name="fmemberlist" id="fmemberlist" action="<?=$home_mng_proc_url?>/timeline_write.php" method="post">
<input type="hidden" name="w" id="act_button" value="">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">

<!-- button_area -->
<div class="button_area02">
	<button class="btn list" type="button" onclick="confirm_pop('수정하기','show', 'form_show');" >
		<span>게재중</span>
	</button>
	<button class="btn list" type="button" onclick="confirm_pop('수정하기','hide', 'form_hide');" >
		<span>게재종료</span>
	</button>
	<button class="btn list" type="button" onclick="confirm_pop('삭제하기','delete', 'form_delete');" >
		<span>삭제</span>
	</button>
	검색결과 <font color="blue"><strong><?=$format_total?></strong></font>


	<div class="float_right">
		<button type="button" class="btn <?if($ic_page_tab == "" || $ic_page_tab == "idx"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('idx');document.search_form.submit();">
			<span>등록일순</span>
		</button>
		<button type="button" class="btn <?if($ic_page_tab == "view_count"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('view_count');document.search_form.submit();">
			<span>조회순</span>
		</button>
		<button type="button" class="btn <?if($ic_page_tab == "like_count"){?>prove<?}else{?>grayback<?}?>" title="저장하기" onclick="$( '#orderby' ).val('like_count');document.search_form.submit();">
			<span>좋아요순</span>
		</button>
	</div>

</div>
<!--// button_area -->

<!-- table 1dan list -->
<div class="table_area">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 5%;">
			<col style="width: 10%;">
			<col style="width: 50%;">
			<col style="width: 10%;">
			<col style="width: 7%;">
			<col style="width: 7%;">
			<col style="width: 10%;">
			<col style="width: 7%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
			</th>
			<th scope="col">NO</th>
			<th scope="col">이미지</th>
			<th scope="col">내용</th>
			<th scope="col">작성자</th>
			<th scope="col">조회수</th>
			<th scope="col">좋아요</th>
			<th scope="col">등록일</th>
			<th scope="col">게재상태</th>
		</tr>
		</thead>
		<tbody>

		<?
		$i=0;
		while($row = mysql_fetch_array($result_list)){
			$virtual_num = $total-$i-$start;
			$store = sql_fetch( "select * from ".$TBA['STORE_TABLE']." where store_code='".$row['store_code']."'" );
		?>

		<tr>
			<td>
				<input type="hidden" name="idx[<?php echo $i ?>]" value="<?php echo $row['idx'] ?>" id="mb_id_<?php echo $i ?>">
				<input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
			</td>
			<td><?=$virtual_num?></td>
			<td><img src="<?=$row['upload_img01']==""?$row['p_upload_img01']:$row['upload_img01']?>" onerror="this.src='./images/common/no_img.png'" width="100"></td>
			<td class="alignl">
				<a href="<?=$link_url?>&pt=write&w=u&vidx=<?=$row['idx']?>">
					<?=$row['wr_comment']?>
				</a>
			</td>
			<td><?=$store['store_name']?></td>
			<td><?=number_format($row['view_count'])?></td>
			<td><?=number_format($row['like_count'])?></td>
			<td><?=$row['signdate_datetime']?></td>
			<td><?=$row['status']=="0"?"게재중":"게재종료"?></td>
		</tr>
		<?
		$i++;
		}
		?>

		<?if($i == 0){?>
		<tr height="100">
			<td colspan="9">데이터가 없습니다.</td>
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



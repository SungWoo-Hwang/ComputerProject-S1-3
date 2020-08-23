<form method="post" action="<?=$home_proc_url?>/point_set.php">
	<!-- button_area -->
	<div class="button_area">
		<div class="">
			<a href="javascript:;" onclick="add_data();" class="btn list" title="목록 페이지로 이동">
				<span>추가하기</span>
			</a>
			<button class="btn save" >
				<span>SAVE</span>
			</button>
		</div>
	</div>
	<!--// button_area -->

	<div >
		<table class="write">
			<caption>게시물관리 등록 화면</caption>
			<colgroup>
				<col style="width: 150px;">
				<col style="width: *;">
			</colgroup>
			<tbody id="point_set_tbody">
			<?
			$ex_point_price = explode("[-price-]",$config['point_buy_price']);
			for($i = 0; $i < count($ex_point_price); $i++){
			?>
			<tr>
				<td>
					<input type="text" name="point_buy_price[]" value="<?=$ex_point_price[$i]?>" class="in_wp150" id="input_title" /> 원
					<button type="button" class="btn delete" style="height: 30px;" onclick="parents_del($( this ));">
						<span>삭제</span>
					</button>
				</td>
			</tr>
			<?}?>
			</tbody>
		</table>
	</div>	
</form>

<script>
function add_data(){
	var append_html = "";

	append_html += '			<tr>';
	append_html += '				<td>';
	append_html += '					<input type="text" name="point_buy_price[]" value="" class="in_wp150" id="input_title" /> 원';
	append_html += '					<button type="button" class="btn delete" style="height: 30px;" onclick="parents_del($( this ));">';
	append_html += '						<span>삭제</span>';
	append_html += '					</button>';
	append_html += '				</td>';
	append_html += '			</tr>';

	$( "#point_set_tbody" ).append( append_html );
}
function parents_del(this_data){
	if($( "#point_set_tbody > tr" ).length < 2){
		alert('한개가 남았을때엔 삭제하실수 없습니다.');
		return;
	}
	this_data.closest('td').closest('tr').remove();
}
</script>
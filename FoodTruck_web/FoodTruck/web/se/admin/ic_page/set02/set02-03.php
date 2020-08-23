<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "set02-01"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set02-01">퀵딜맨</a></li>
		<li <?if($pt == "set02-02"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set02-02">퀵서비스</a></li>
		<li <?if($pt == "set02-03"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set02-03">택배</a></li>
	</ul>
</div>

<form method="post" action="<?=$home_proc_url?>/point_set.php">
	<!-- button_area -->
	<div class="button_area">
		<div class="float_right">
			<button class="btn save" >
				<span>SAVE</span>
			</button>
		</div>
	</div>
	<!--// button_area -->

	<div style="">
		<table class="write">
			<caption>게시물관리 등록 화면</caption>
			<colgroup>
				<col style="width: 150px;">
				<col style="width: *;">
			</colgroup>
			<tbody id="point_set_tbody">
			<tr>
				<th>
					기본료 적용
				</th>
				<td>
					<input type="text" name="point_buy_price[]" value="<?=$ex_point_price[$i]?>" class="in_wp150" id="input_title" /> 원
				</td>
			</tr>
			<tr>
				<th>
					1km당
				</th>
				<td>
					<input type="text" name="point_buy_price[]" value="<?=$ex_point_price[$i]?>" class="in_wp150" id="input_title" /> 원
				</td>
			</tr>
			</tbody>
		</table>
	</div>	
</form>

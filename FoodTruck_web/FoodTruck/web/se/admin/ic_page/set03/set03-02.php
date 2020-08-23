<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "set03-01"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set03-01">퀵딜맨</a></li>
		<li <?if($pt == "set03-02"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set03-02">퀵서비스</a></li>
		<li <?if($pt == "set03-03"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set03-03">택배</a></li>
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
					설정기준
				</th>
				<td>
					<input type="radio" name="radio" value="" id="radio01" onclick="$('#set_price_txt').text('원');"> <label for="radio01">건당</label>　　
					<input type="radio" name="radio" value="" id="radio02" onclick="$('#set_price_txt').text('%');"> <label for="radio02">퍼센트</label>
				</td>
			</tr>
			<tr>
				<th>
					금액
				</th>
				<td>
					<input type="text" name="point_buy_price[]" value="<?=$ex_point_price[$i]?>" class="in_wp150" id="input_title" /> <span id="set_price_txt">원</span>
				</td>
			</tr>

			</tbody>
		</table>
	</div>	
</form>

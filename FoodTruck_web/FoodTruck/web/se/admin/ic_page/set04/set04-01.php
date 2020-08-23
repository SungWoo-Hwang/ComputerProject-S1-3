<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "set04-01"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-01">서비스 이용약관</a></li>
		<li <?if($pt == "set04-02"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-02">개인정보 수집 및 이용동의</a></li>
		<li <?if($pt == "set04-03"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-03">위치기반 서비스 약관</a></li>
		<li <?if($pt == "set04-04"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-04">이벤트 및 혜택 알림 수신 동의</a></li>
		<li <?if($pt == "set04-05"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-05">배송위탁계약서 동의</a></li>
		<li <?if($pt == "set04-06"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-06">보안확약서 동의</a></li>
		<li <?if($pt == "set04-07"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set04-07">개인정보처리업무위탁계약서 동의</a></li>
	</ul>
</div>

<form method="post" action="<?=$home_proc_url?>/point_set.php">
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
					내용
				</th>
				<td>
					<textarea name="" rows="" cols="" class="in_w100" ></textarea>
				</td>
			</tr>

			</tbody>
		</table>
	</div>	
	<!-- button_area -->
	<div class="button_area margint20">
		<div class="alignr">
			<button class="btn save" title="저장하기">
				<span>저장</span>
			</button>
		</div>
	</div>
	<!--// button_area -->
</form>

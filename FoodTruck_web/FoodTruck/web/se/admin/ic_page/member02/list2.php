
<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<button class="btn list linkbutton" ldata="<?=$home_admin_proc_url?>/asdfjlkasjdflajsldf.php">
			<span>승인</span>
		</button>
	</div>
</div>
<!--// button_area -->

<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "list"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=list">미확인 25</a></li>
		<li <?if($pt == "list2"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=list2">반려 5</a></li>
		<li <?if($pt == "list3"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=list3">인증완료 225</a></li>
		<li <?if($pt == "list4"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=list4">인증카드 발송 7</a></li>
	</ul>
</div>


<!-- table 1dan list -->
<div class="table_area margint5">
	<table class="list fixed">
		<caption>게시판 관리 리스트 화면</caption>
		<colgroup>
			<col style="width: 2%;">
			<col style="width: 5%;">
			<col style="width: 4%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
			<col style="width: 15%;">
		</colgroup>
		<thead>
		<tr>
			<th scope="col">
				<input type="checkbox" name="">
			</th>
			<th scope="col">NO</th>
			<th scope="col">OS</th>
			<th scope="col">가입일</th>
			<th scope="col">이름</th>
			<th scope="col">닉네임</th>
			<th scope="col">휴대폰</th>
			<th scope="col">이메일</th>
			<th scope="col">인증처리</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><input type="checkbox" name=""></td>
			<td>5</td>
			<td>A</td>
			<td>2018-10-10 15:32</td>
			<td>Name</td>
			<td>Nick Name</td>
			<td>01021541215</td>
			<td>abc@naver.com</td>
			<td>
				<button class="btn prove" title="저장하기" onclick="$('.l_pop01').show();">
					<span>승인</span>
				</button>			
			</td>
		</tr>
		</tbody>
	</table>
</div>
<!--// table 1dan list -->	

<!-- paging_area -->
<div class="paging_area02">
	<a href="#" class="stimg" title="맨처음 페이지로 이동"><img src="./images/common/btn_paging_first_off.png" alt="맨처음 페이지로 이동"></a>
	<a href="#" class="stimg" title="전 페이지로 이동"><img src="./images/common/btn_paging_prev_off.png" alt="전 페이지로 이동"></a>
	page
	<strong>1</strong>
	of 22
	<a href="#" class="stimg" title="다음 페이지로 이동"><img src="./images/common/btn_paging_next_on.png" alt="다음 페이지로 이동"></a>
	<a href="#" class="stimg" title="맨마지막 페이지로 이동"><img src="./images/common/btn_paging_last_on.png" alt="맨마지막 페이지로 이동"></a>
</div>
<!--// paging_area -->	

<?
if($w == "u"){
	$row = sql_fetch( "select * from ".$TBA['TIMELINE']." where idx='".$vidx."'" );
}
?>


<form method="post" action="<?=$home_mng_proc_url?>/timeline_write.php" name="board_form" onsubmit="return board_func();" enctype="multipart/form-data">
	<input type="hidden" name="w" value="<?=$w?>">
	<input type="hidden" name="uidx" value="<?=$vidx?>">
	<input type="hidden" name="ic_page" value="<?=$ic_page?>">
	<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
	<input type="hidden" name="pt" value="<?=$pt?>">

	<!-- table_area -->
	<div class="table_area margint10">
		<table class="write margint10">
			<caption>게시물관리 등록 화면</caption>
			<colgroup>
				<col style="width: 10%;">
				<col style="width: 90%">
			</colgroup>
			<tbody>

			<tr>
				<th scope="row">
					게재상태
				</th>
				<td>
					<input type="radio" name="status" value="0" id="radio02" checked> <label for="radio02">게재중</label>　　
					<input type="radio" name="status" value="1" id="radio03" <?if($row['status'] == '1'){?>checked<?}?>> <label for="radio03">게재종료</label>　　
				</td>
			</tr>
			<tr>
				<th scope="row">
					이미지1
				</th>
				<td>
					<input type="file" name="upload_img01" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['upload_img01'] != ""){?>
						<img src="<?=$row['upload_img01']?>" onerror="this.src='./images/common/no_img.png'" width="250" class="margint10">
					<?}?>					
				</td>
			</tr>
			<tr>
				<th scope="row">
					이미지2
				</th>
				<td>
					<input type="file" name="upload_img02" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['upload_img02'] != ""){?>
						<img src="<?=$row['upload_img02']?>" onerror="this.src='./images/common/no_img.png'" width="250" class="margint10">
					<?}?>					
				</td>
			</tr>
			<tr>
				<th scope="row">
					이미지3
				</th>
				<td>
					<input type="file" name="upload_img03" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['upload_img03'] != ""){?>
						<img src="<?=$row['upload_img03']?>" onerror="this.src='./images/common/no_img.png'" width="250" class="margint10">
					<?}?>					
				</td>
			</tr>

			<tr>
				<th scope="row">
					상품이미지1
				</th>
				<td>
					<input type="hidden" name="p_upload_img01" value="<?=$row['p_upload_img01']?>" id="p_upload_img01">
					<a href="javascript:;" onclick="popupOpen('p_upload_img01');" class="btn save">불러오기</a>

					<?if($w == "u" && $row['p_upload_img01'] != ""){?>
						<p id="p_upload_img01_pic"><img src="<?=$row['p_upload_img01']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10"></p>
					<?} else {?>					
						<p class="margint5" id="p_upload_img01_pic"></p>
					<?}?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					상품이미지2
				</th>
				<td>
					<input type="hidden" name="p_upload_img02" value="<?=$row['p_upload_img02']?>" id="p_upload_img02">
					<a href="javascript:;" onclick="popupOpen('p_upload_img02');" class="btn save">불러오기</a>

					<?if($w == "u" && $row['p_upload_img02'] != ""){?>
						<p id="p_upload_img02_pic"><img src="<?=$row['p_upload_img02']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10"></p>
					<?} else {?>					
						<p class="margint5" id="p_upload_img02_pic"></p>
					<?}?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					상품이미지3
				</th>
				<td>
					<input type="hidden" name="p_upload_img03" value="<?=$row['p_upload_img03']?>" id="p_upload_img03">
					<a href="javascript:;" onclick="popupOpen('p_upload_img03');" class="btn save">불러오기</a>

					<?if($w == "u" && $row['p_upload_img03'] != ""){?>
						<p id="p_upload_img03_pic"><img src="<?=$row['p_upload_img03']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10"></p>
					<?} else {?>					
						<p class="margint5" id="p_upload_img03_pic"></p>
					<?}?>
				</td>
			</tr>

			<tr>
				<th scope="row">
					내용
				</th>
				<td id="mng_code_set">
					<textarea name="wr_comment" rows="" cols="" class="in_w100"><?=$row['wr_comment']?></textarea>			
				</td>
			</tr>

			</tbody>
		</table>

	</div>
	<!--// table_area -->


	<!-- button_area -->
	<div class="button_area">
		<div class="alignc">
			<a href="<?=$link_url?>=<?=$ic_page?>&ic_sub_page=<?=$ic_sub_page?>" class="btn list" title="목록 페이지로 이동">
				<span>목록</span>
			</a>
			<button class="btn save" title="저장하기">
				<span>저장</span>
			</button>
		</div>
	</div>
	<!--// button_area -->

</form>

<script type="text/javascript">
<!--

function img_src_func(sid, pic_url){
	$( "#" + sid ).val( pic_url );
	$( "#" + sid + "_pic" ).html( "<img src='" + pic_url + "' width='200'>" );
}
function popupOpen(sid){

	var popUrl = "<?=$admin_url?>/ic_page/product_list_pop.php?sid=" + sid;	//팝업창에 출력될 페이지 URL

	var popOption = "width=970, height=660, resizable=no, scrollbars=yes, status=no;";    //팝업창 옵션(optoin)

	window.open(popUrl,"",popOption);

}




function board_func(){
	var f = document.board_form;
	oEditors.getById["w_comment"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.


	if(f.wr_subject.value == ""){
		alert("제목을 입력해주세요.");
		f.wr_subject.focus();
		return false;
	}

	if(f.w_comment.value == "<br>" || f.w_comment.value == ""){
		alert("내용을 입력해주세요.");
		f.w_comment.focus();
		return false;
	}

	return true;	
}
//-->
</script>
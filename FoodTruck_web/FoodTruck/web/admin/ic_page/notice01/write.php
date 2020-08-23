<?
$row = sql_fetch( "select * from ".$TBA['JY_NOTICE']." where key_index='".$vidx."'" );
$row['w_comment'] = $row['wr_comment'];

$img_src = $home_data_url.'/notice';
$proc_url = "notice_write.php";

?>
<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('삭제처리','delete', '<?=$home_admin_proc_url?>/<?=$proc_url?>?ic_page=<?=$ic_page?>&ic_sub_page=<?=$ic_sub_page?>&w=d&didx=<?=$row['key_index']?>');" >
			<span>삭제</span>
		</a>
	</div>
</div>
<!--// button_area -->

<form method="post" action="<?=$home_admin_proc_url?>/notice_write.php" name="board_form" onsubmit="return board_func();" enctype="multipart/form-data">
	<input type="hidden" name="w" value="<?=$w?>">
	<input type="hidden" name="uidx" value="<?=$vidx?>">
	<input type="hidden" name="ic_page" value="<?=$ic_page?>">
	<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
	<input type="hidden" name="pt" value="<?=$pt?>">
	<input type="hidden" name="type" value="0">

	<!-- table_area -->
	<div class="table_area">
		<table class="write margint10">
			<caption>게시물관리 등록 화면</caption>
			<colgroup>
				<col style="width: 10%;">
				<col style="width: 90%">
			</colgroup>
			<tbody>

			
			
			<tr>
				<th scope="row">
					제목
				</th>
				<td>
					<input type="text" name="wr_subject" value="<?=$row['title']?>" class="in_w100" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					내용
				</th>
				<td>
					<textarea name="w_comment" rows="5" cols="33" class="in_w100"><?=$row['body']?></textarea>	
				</td>
			</tr>

			<tr>
				<th scope="row">
					대표이미지
				</th>
				<td>
					<input type="file" name="upload_file" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['upload_file'] != ""){?>
						<img src="<?=$row['upload_file']?>" width="300" class="margint10">
					<?}?>
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

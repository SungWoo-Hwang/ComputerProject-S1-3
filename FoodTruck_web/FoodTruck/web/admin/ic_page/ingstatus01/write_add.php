<?
$row = sql_fetch( "select * from ".$TBA['PRODUCT_TABLE']." where idx='".$vidx."'" );

$cate1_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU1' and REFCD='".$row['cate1']."'" );
$cate2_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU2' and REFCD='".$row['cate2']."'" );
$cate3_row = sql_fetch( "select REFNM from ".$TBA['CATEGORY_INfO']." where GBNCD='GU3' and REFCD='".$row['cate3']."'" );

?>


<form method="post" action="<?=$home_admin_proc_url?>/product_write.php" name="board_form" onsubmit="return board_func();" enctype="multipart/form-data">
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
					분류
				</th>
				<td>
					<select name="cate1">
						<option value="" selected>대분류
						<?
						$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU1') order by idx asc";
						$ca1_result = mysql_query($ca1_query);
						while($ca1_row = mysql_fetch_array($ca1_result)){
						?>						
						<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $row['cate1']){?>selected<?}?>><?=$ca1_row['REFNM']?>
						<?}?>
					</select>
					<select name="cate2">
						<option value="" selected>중분류
						<?
						$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU2') order by idx asc";
						$ca1_result = mysql_query($ca1_query);
						while($ca1_row = mysql_fetch_array($ca1_result)){
						?>						
						<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $row['cate2']){?>selected<?}?>><?=$ca1_row['REFNM']?>
						<?}?>
					</select>
					<select name="cate3">
						<option value="" selected>소분류
						<?
						$ca1_query = "select * from ".$TBA['CATEGORY_INfO']." where (1) and (GBNCD = 'GU3') and REFNM != '' order by idx asc";
						$ca1_result = mysql_query($ca1_query);
						while($ca1_row = mysql_fetch_array($ca1_result)){
						?>						
						<option value="<?=$ca1_row['REFCD']?>" <?if($ca1_row['REFCD'] == $row['cate3']){?>selected<?}?>><?=$ca1_row['REFNM']?>
						<?}?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					상품명
				</th>
				<td>
					<input type="text" name="wr_subject" value="<?=$row['wr_subject']?>" class="in_w100" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					부제목
				</th>
				<td>
					<input type="text" name="wr_s_subject" value="<?=$row['wr_s_subject']?>" class="in_w100" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					상품설명
				</th>
				<td>
					<textarea name="wr_comment" class="in_w100"><?=$row['wr_comment']?></textarea>
				</td>
			</tr>
			<tr>
				<th scope="row">
					대표이미지
				</th>
				<td>
					<?if($row['list_file'] != ""){?>
						<img src="<?=$row['list_file']?>" onerror="this.src='./images/common/no_img.png'" width="250" class="margint10">
					<?}?>					
				</td>
			</tr>
			<tr>
				<th scope="row">
					상세이미지
				</th>
				<td>
					<table >
					<tr>
						<td style="border-bottom: none;">
							<?if($row['img_file01'] != ""){?>
								<img src="<?=$row['img_file01']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10">
							<?}?>	
						</td>
						<td style="border-bottom: none;">
							<?if($row['img_file02'] != ""){?>
								<img src="<?=$row['img_file02']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10">
							<?}?>	
						</td>
						<td style="border-bottom: none;">
							<?if($row['img_file03'] != ""){?>
								<img src="<?=$row['img_file03']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10">
							<?}?>	
						</td>
						<td style="border-bottom: none;">
							<?if($row['img_file04'] != ""){?>
								<img src="<?=$row['img_file04']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10">
							<?}?>	
						</td>
						<td style="border-bottom: none;">
							<?if($row['img_file05'] != ""){?>
								<img src="<?=$row['img_file05']?>" onerror="this.src='./images/common/no_img.png'" width="200" class="margint10">
							<?}?>	
						</td>
					</tr>
					</table>
				</td>
			</tr>
			</tbody>
		</table>

	</div>
	<!--// table_area -->


	<!-- button_area -->
	<div class="button_area">
		<div class="alignc">
			<!-- button_area -->
			<div class="button_area">
				<div class="alignc">
					<a href="javascript: history.go(-1);" class="btn list" title="목록 페이지로 이동">
						<span>취소</span>
					</a>
					<button class="btn save" title="저장하기">
						<span>저장</span>
					</button>
				</div>
			</div>
			<!--// button_area -->
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
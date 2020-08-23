<?
$row = sql_fetch( "select * from ".$TBA['EVENT_TABLE']." where idx='".$vidx."'" );
$row['w_comment'] = $row['wr_comment'];

$img_src = $home_data_url.'/event';
$proc_url = "event_write.php";


$ex_s_date = explode(" ", $row['sdate']);
$ex_e_date = explode(" ", $row['edate']);

?>
<!-- button_area -->
<div class="button_area">
	<div class="float_right">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('삭제처리','delete', '<?=$home_admin_proc_url?>/<?=$proc_url?>?ic_page=<?=$ic_page?>&ic_sub_page=<?=$ic_sub_page?>&w=d&didx=<?=$row['idx']?>');" >
			<span>삭제</span>
		</a>
	</div>
</div>
<!--// button_area -->

<form method="post" action="<?=$home_admin_proc_url?>/event_write.php" name="board_form" onsubmit="return board_func();" enctype="multipart/form-data">
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
					노출여부
				</th>
				<td>
					<input type="radio" name="view_type" value="0" id="view_type1" <?if($row['view_type'] == "0"){?>checked<?}?>> <label for="view_type1">전체</label>　　
					<input type="radio" name="view_type" value="1" id="view_type2" <?if($row['view_type'] == "1"){?>checked<?}?>> <label for="view_type2">고객회원</label>　　
					<input type="radio" name="view_type" value="2" id="view_type3" <?if($row['view_type'] == "2"){?>checked<?}?>> <label for="view_type3">매장회원</label>
				</td>
			</tr>
			<tr>
				<th scope="row">
					공지글
				</th>
				<td>
					<input type="checkbox" name="is_notice" value="-1" <?if($row['is_notice'] == "-1"){?>checked<?}?>>
				</td>
			</tr>
			<tr>
				<th scope="row">
					이벤트명
				</th>
				<td>
					<input type="text" name="wr_subject" value="<?=$row['wr_subject']?>" class="in_w100" />
				</td>
			</tr>

			<tr>
				<th scope="row">
					상태
				</th>
				<td>
					<input type="radio" name="status" value="0" id="radio01" checked> <label for="radio01">진행중</label>　　
					<input type="radio" name="status" value="1" id="radio02" <?if($row['status'] == '1'){?>checked<?}?>> <label for="radio02">종료</label>
				</td>
			</tr>

			<tr>
				<th scope="row">
					이벤트기간
				</th>
				<td>
					<input type="text" name="sdate" value="<?php echo $ex_s_date[0] ?>" id="sdate" class="in_wp100" placeholder="">
					~
					<input type="text" name="edate" value="<?php echo $ex_e_date[0] ?>" id="edate" class="in_wp100" placeholder="">

					<script>
					$(function(){
						$("#sdate, #edate").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99" });
					});
					</script>
				</td>
			</tr>
			<tr>
				<th scope="row">
					대표이미지
				</th>
				<td>
					<input type="file" name="img_file01" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['img_file01'] != ""){?>
						<img src="<?=$row['img_file01']?>" width="300" class="margint10">
					<?}?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					이벤트 이미지
				</th>
				<td>
					<input type="file" name="img_file02" class="in_w100" id="input_titlelink" />
					<?if($w == "u" && $row['img_file02'] != ""){?>
						<img src="<?=$row['img_file02']?>" width="300" class="margint10">
					<?}?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					이벤트 내용
				</th>
				<td>
					<?
						include_once $home_editor_path."/editor_area.php";
					?>
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

<?
$row = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where idx='".$vidx."'" );
$proc_url = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=abort_back&didx=".$row['idx'];
$store = sql_fetch( "select * from ".$TBA['STORE_TABLE']." where store_code='".$row['store_code']."'" );

?>


<!-- button_area -->
<div class="">
	<div class="alignr">
		<a href="javascript:;" class="btn list" onclick="confirm_pop('계정 복구','abort_back', '<?=$home_admin_proc_url?>/<?=$proc_url?>');" >
			<span>계정복구</span>
		</a>
	</div>
</div>
<!--// button_area -->

<form method="post" name="store_form" action="<?=$home_admin_proc_url?>/member_update.php" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?=$w?>">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
<input type="hidden" name="uidx" value="<?=$row['idx']?>">
<input type="hidden" name="pt" value="<?=$pt?>">

<!-- table_area -->
<div class="table_area margint10">
	<h4 class="title">기본정보</h4>
	<table class="write margint10">
		<caption>게시물관리 등록 화면</caption>
		<colgroup>
			<col style="width: 10%;">
			<col style="width: 40%">
			<col style="width: 10%;">
			<col style="width: 40%">
		</colgroup>
		<tbody>

		<tr>
			<th scope="row">
				가입일
			</th>
			<td>
				<?=$row['signdate_datetime']?>
			</td>
			<th scope="row" rowspan="2">
				프로필
			</th>
			<td rowspan="2">
				
				<img src="<?=$row['profile_img']?>" onerror="this.src='./images/common/no_img.png'" width="100">
			</td>
		</tr>
		<tr>
			<th scope="row">
				매장
			</th>
			<td>
				<?=$store['store_name']?>
			</td>
		</tr>

		<tr>
			<th scope="row">
				핸드폰번호(ID)
			</th>
			<td colspan="3">
				<?=$row['mb_id']?>

			</td>
		</tr>
		<tr>
			<th scope="row">
				비밀번호
			</th>
			<td colspan="3">
				매장 번호 : <?=$row['mb_password']?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				이름
			</th>
			<td colspan="3">
				<?=$row['mb_name']?>
			</td>
		</tr>

		<tr>
			<th scope="row">
				메모
			</th>
			<td colspan="3">
				<textarea name="mb_memo" rows="" cols="" class="in_w100"><?=$row['mb_memo']?></textarea>
			</td>
		</tr>

		<!-- <tr>
			<th scope="row">
				매장 변경이력
			</th>
			<td colspan="3">
				<p>롯데강남점 2019.01.20 12:00</p>
				<p>롯데강남점 2019.01.20 12:00</p>
			</td>
		</tr> -->
		</tbody>
	</table>

</div>
<!--// table_area -->

<!-- button_area -->
<div class="button_area">
	<div class="alignc">
		<a href="javascript:history.go(-1);" class="btn list" title="목록 페이지로 이동">
			<span>목록</span>
		</a>
		<button class="btn save" title="저장하기">
			<span>저장</span>
		</button>
	</div>
</div>
<!--// button_area -->

</form>
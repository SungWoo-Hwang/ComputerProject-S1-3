<?
echo 1;

$row = sql_fetch( "select * from ".$TBA['JY_MEMBER']." where key_index='".$vidx."'" );
$proc_url = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=abort&didx=".$row['idx'];
$proc_url2 = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=black&didx=".$row['idx'];

?>




<form method="post" name="store_form" action="<?=$home_admin_proc_url?>/member_update.php" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?=$w?>">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
<input type="hidden" name="uidx" value="<?=$row['key_index']?>">
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
				아이디
			</th>
			<td>
				<?=$row['id']?>
			</td>
			
		</tr>
		

		<tr>
			<th scope="row">
				비밀번호
			</th>
			<td colspan="3">
				<input type="text" name="pw" value="<?=$row['pw']?>" class="in_wp300" placeholder="비밀번호" />
			</td>
		</tr>
		<tr>
			<th scope="row">
				소개소명
			</th>
			<td colspan="3">
				<?=$row['name_sub']?>
			</td>
		</tr>
		

		<tr>
			<th scope="row">
				활동지역
			</th>
			<td>
				<?=$row['place01']?>
			</td>
		</tr>

		<tr>
			<th scope="row">
				무선번호
			</th>
			<td colspan="3">
				<?=$row['phone_number']?>
			</td>
		</tr>


		<tr>
			<th scope="row">
				가입날짜
			</th>
			<td colspan="3">
				<?=$row['signdate']?>
			</td>
		</tr>
		
		<tr>
			<th scope="row">
				힌트
			</th>
			<td colspan="3">
				<?=$row['hint']?>
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
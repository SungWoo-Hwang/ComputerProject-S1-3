<?
$row = sql_fetch( "select * from mem_tb where KEYINDEX='".$vidx."'" );
$proc_url = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=abort&didx=".$row['KEYINDEX'];
$proc_url2 = "member_update.php?ic_page=".$ic_page."&ic_sub_page=".$ic_sub_page."&w=black&didx=".$row['KEYINDEX'];

?>




<form method="post" name="store_form" action="<?=$home_admin_proc_url?>/member_update.php" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?=$w?>">
<input type="hidden" name="ic_page" value="<?=$ic_page?>">
<input type="hidden" name="ic_sub_page" value="<?=$ic_sub_page?>">
<input type="hidden" name="uidx" value="<?=$row['KEYINDEX']?>">
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
				<?=$row['ID']?>
			</td>
			
		</tr>
		<tr>
			<th scope="row">
				이름
			</th>
			<td>
				<?=$row['NAME']?>
				
			</td>
		</tr>

		<tr>
			<th scope="row">
				비밀번호
			</th>
			<td colspan="3">
				<?=$row['PW']?>
			</td>
		</tr>
		<tr>
			<th scope="row">
				이메일
			</th>
			<td colspan="3">
				<?=$row['EMAIL']?>
			</td>
		</tr>
		
		<tr>
			<th scope="row">
				주소
			</th>
			<td colspan="3">
				<?=$row['ADDRESS']?>
			</td>
		</tr>
		
		<tr>
			<th scope="row">
				소개
			</th>
			<td colspan="3">
				<?=$row['INTRODUCE']?>
			</td>
		</tr>

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
		<button class="btn save" title="승인하기">
			<span>승인하기</span>
		</button>
	</div>
</div>
<!--// button_area -->

</form>
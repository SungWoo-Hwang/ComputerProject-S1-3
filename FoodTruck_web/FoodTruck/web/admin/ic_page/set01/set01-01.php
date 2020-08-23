<?
$row['w_comment'] = $config['agree01'];
?>
<div class="tab_area">
	<ul class="tablist">
		<li <?if($pt == "set01-01"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set01-01">서비스 이용약관</a></li>
		<li <?if($pt == "set01-02"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set01-02">개인정보 수집 및 이용동의</a></li>
		<li <?if($pt == "set01-03"){?>class="on"<?}?>><a href="<?=$link_url?>&pt=set01-03">이벤트 및 혜택 알림 수신동의</a></li>
	</ul>
</div>

<form method="post" name="provision_form" action="<?=$home_admin_proc_url?>/provision_proc.php" onsubmit="return provision_func();">
	<input type="hidden" name="agree_name" value="agree01">
	<input type="hidden" name="pt" value="<?=$pt?>">
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
				<?
					include_once $home_editor_path."/editor_area.php";
				?>
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

<script type="text/javascript">
<!--

function provision_func(){
	var f = document.provision_form;
	oEditors.getById["w_comment"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.


	if(f.w_comment.value == "<br>" || f.w_comment.value == ""){
		alert("내용을 입력해주세요.");
		f.w_comment.focus();
		return false;
	}

	return true;	
}
//-->
</script>
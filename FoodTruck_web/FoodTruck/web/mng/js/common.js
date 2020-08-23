$( document ).ready(function(){
	$( ".linkbutton" ).click(function(){
		var ldata = $( this ).attr( "ldata" );
		location.href = ldata;
	});
	$( "#linkbutton_confirm" ).click(function(){
		var ldata = $( this ).attr( "ldata" );

		if(ldata == "abort_back_ok"){
			$( "#act_button" ).val( "계정복구" );
			$( "#fmemberlist" ).submit();
		} else if(ldata == "backlist_back_ok"){
			$( "#act_button" ).val( "블랙리스트해제" );
			$( "#fmemberlist" ).submit();
		} else if(ldata == "form_show"){
			$( "#act_button" ).val( "진열함" );
			$( "#fmemberlist" ).submit();
		} else if(ldata == "form_hide"){
			$( "#act_button" ).val( "진열안함" );
			$( "#fmemberlist" ).submit();
		} else if(ldata == "form_delete"){
			$( "#act_button" ).val( "삭제" );
			$( "#fmemberlist" ).submit();
		} else {
			location.href = ldata;
		}

	});
});

function confirm_pop(title, comment, ldata){
	var comment_txt = "";
	if(comment == "aboat") comment_txt = "탈퇴처리 하시겠습니까?";
	if(comment == "abort_back") comment_txt = "계정복구하시겠습니까?";
	if(comment == "blacklist") comment_txt = "블랙리스트에 추가시 서비스이용이 제한됩니다.<BR>블랙리스트에 추가하시겠습니까?";
	if(comment == "blacklist_back") comment_txt = "블랙리스트를 해제하시겠습니까?";
	if(comment == "delete") comment_txt = "삭제하시겠습니까?";
	if(comment == "show") comment_txt = "진열하시겠습니까?";
	if(comment == "hide") comment_txt = "노출을 제외 시키겠습니까?";

	$( "#confirm_title" ).html( title );
	$( "#confirm_comment" ).html( comment_txt );
	$( "#linkbutton_confirm" ).attr( "ldata", ldata );
	$( ".confirm_popup" ).show();
}

function check_all(f)
{
    var chk = document.getElementsByName("chk[]");

    for (i=0; i<chk.length; i++)
        chk[i].checked = f.chkall.checked;
}
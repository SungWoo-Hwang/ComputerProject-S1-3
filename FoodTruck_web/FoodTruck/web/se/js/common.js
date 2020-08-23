$( document ).ready(function(){
	$( ".linkbutton" ).click(function(){
		var ldata = $( this ).attr( "ldata" );
		location.href = ldata;
	});
	$( "#linkbutton_confirm" ).click(function(){
		var ldata = $( this ).attr( "ldata" );
		location.href = ldata;
	});
});

function confirm_pop(title, comment, ldata){
	var comment_txt = "";
	if(comment == "aboat") comment_txt = "탈퇴처리 하시겠습니까?";
	if(comment == "abort_back") comment_txt = "계정복구하시겠습니까?";
	if(comment == "blacklist") comment_txt = "블랙리스트에 추가시 서비스이용이 제한됩니다.<BR>블랙리스트에 추가하시겠습니까?";
	if(comment == "blacklist_back") comment_txt = "블랙리스트를 해제하시겠습니까?";
	if(comment == "delete") comment_txt = "삭제하시겠습니까?";

	$( "#confirm_title" ).html( title );
	$( "#confirm_comment" ).html( comment_txt );
	$( "#linkbutton_confirm" ).attr( "ldata", ldata );
	$( ".confirm_popup" ).show();
}
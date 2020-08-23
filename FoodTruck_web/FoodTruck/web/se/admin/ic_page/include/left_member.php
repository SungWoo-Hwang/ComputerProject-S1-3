<!-- left_area -->
<div class="left_area">
	<div class="lnb_area">
		<h2 class="title"><?=$depth01_title[$ic_page]?></h2>
		<!-- lnb -->
		<div class="lnb_area">
			<ul class="lnb">
				<li <?if($ic_sub_page == "member01"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=member01"><span>회원</span></a></li>
				<li <?if($ic_sub_page == "member02"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=member02"><span>퀵딜맨 인증관리</span></a></li>
				<li <?if($ic_sub_page == "member03"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=member03"><span>탈퇴고객</span></a></li>
				<li <?if($ic_sub_page == "member04"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=member04"><span>블랙리스트</span></a></li>
			</ul>
		</div>
		<!--// lnb -->
	</div>
</div>
<!--// left_area -->
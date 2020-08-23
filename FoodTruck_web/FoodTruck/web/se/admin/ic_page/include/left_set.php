<!-- left_area -->
<div class="left_area">
	<div class="lnb_area">
		<h2 class="title"><?=$depth01_title[$ic_page]?></h2>
		<!-- lnb -->
		<div class="lnb_area">
			<ul class="lnb">
				<li <?if($ic_sub_page == "set01"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=set01"><span>충전 포인트 설정</span></a></li>
				<li <?if($ic_sub_page == "set02"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=set02"><span>배송료 설정</span></a></li>
				<li <?if($ic_sub_page == "set03"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=set03"><span>수수료 설정</span></a></li>
				<li <?if($ic_sub_page == "set04"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=set04"><span>약관</span></a></li>
			</ul>
		</div>
		<!--// lnb -->
	</div>
</div>
<!--// left_area -->
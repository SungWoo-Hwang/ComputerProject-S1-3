<!-- left_area -->
<div class="left_area">
	<div class="lnb_area">
		<h2 class="title"><?=$depth01_title[$ic_page]?></h2>
		<!-- lnb -->
		<div class="lnb_area">
			<ul class="lnb">
				<li <?if($ic_sub_page == "charge01"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=charge01"><span>충전 신청내역</span></a></li>
				<li <?if($ic_sub_page == "charge02"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=charge02"><span>충전 내역</span></a></li>
				<li <?if($ic_sub_page == "charge03"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=charge03"><span>사용/환불 내역</span></a></li>
				<li <?if($ic_sub_page == "charge04"){?>class="on"<?}?>><a href="<?=$ic_sub_page_url?>=charge04"><span>출금/지급 내역</span></a></li>
			</ul>
		</div>
		<!--// lnb -->
	</div>
</div>
<!--// left_area -->
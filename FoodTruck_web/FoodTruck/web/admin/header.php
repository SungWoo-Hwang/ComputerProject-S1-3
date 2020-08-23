<!-- header -->
<div id="header">
<header>
	<!-- gnb_menu -->
	<div id="nav">
	<nav>
		<ul class="menu">
			<li class="logo_title"><a href="<?=$ic_page_url?>=member" ><span>관리자</span></a></li>

			<li <?if($ic_page == "member"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=member" ><span>고객관리</span></a></li>
			<li <?if($ic_page == "account"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=account" ><span>리뷰</span></a></li>
</span></a></li>

<!-- 
			<li <?if($ic_page == "customer"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=customer" ><span>게시판관리</span></a></li>
			<li <?if($ic_page == "pushsend"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=pushsend" ><span>푸쉬발송</span></a></li>
			<li <?if($ic_page == "set"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=set" ><span>설정</span></a></li>
-->
		</ul>
	</nav>
	</div>
	<!--// gnb_menu -->
	<!-- hsection -->
	<div class="hsection_area">
		<span>HI 관리자님</span>
		<a href="<?=$home_admin_proc_url?>/logout.php" class="btn logout" title="로그아웃 하기">
			<span>Log Out</span>
		</a>
	</div>
	<!--// hsection -->
</header>
</div>
<!-- //header -->
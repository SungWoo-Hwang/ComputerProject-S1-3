<div class="location">
	<ul>
		<li>HOME</li>

		<?if($ic_sub_page != ''){?>
			<li>
				<?=$depth01_title[$ic_page]?>
			</li>
		<?} else {?>
			<li>
				<strong><?=$depth01_title[$ic_page]?></strong>
			</li>
		<?}?>


		<?if($ic_sub_page != ''){?>
			<li>
				<strong><?=$depth02_title[$ic_sub_page]?></strong>
			</li>
		<?}?>
	</ul>
</div>
<div id="work-details">
	<div class="clear">
		<div class="float-left">
			<a href="<?php echo $work['url'] ?>" target="_blank">
				<img src="<?php echo $work['image'] ?>" />
			</a>
		</div>
		<div class="float-right">
			<h3><a href="<?php echo $work['url'] ?>" target="_blank"><?php echo $work['display_url'] ?></a></h3>
			<p><?php echo nl2br($work['description']) ?></p>
		</div>
	</div>
</div>
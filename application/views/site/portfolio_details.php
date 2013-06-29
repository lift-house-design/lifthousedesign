<div id="work-details">
	<div class="clear">
		<div class="float-left">
			<a href="<?php echo $work['url'] ?>" target="_blank">
				<img src="<?php echo $work['image'] ?>" /><br />
				Click here to check out the site!
			</a>
		</div>
		<div class="float-right">
			<h3><?php echo $work['name'] ?></h3>
			<p><?php echo nl2br($work['description']) ?></p>
		</div>
	</div>
</div>
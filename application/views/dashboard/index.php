<?php
	function lorem_ipsum()
	{
		?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed tincidunt felis. Suspendisse fringilla est arcu, 
quis pretium felis ullamcorper eget. Aliquam et mollis metus, eu condimentum risus. Nunc magna tortor, tempor commodo
sapien sit amet, consequat sollicitudin mauris. Curabitur accumsan neque arcu, vel commodo nunc eleifend sed. Integer
urna eros, tempus sollicitudin orci at, bibendum cursus velit.</p>
		<?php
	}
?>
<div id="dashboard">
	<h2 class="colorbar-1">Estimates</h2>
	<table id="estimates">
		<thead>
			<tr>
				<td>Subject</td>
				<td class="center">Date</td>
				<td class="center">Amount</td>
				<td class="center">Status</td>
			</tr>
		</thead>
		<tbody>
		<?php for($i=0;$i<5;$i++): ?>
			<tr>
				<td>Web Foundation - NTRocks.com</td>
				<td class="center">07/02/2013</td>
				<td class="center">$4,560.00</td>
				<td class="center">
					<a class="primary button">Accept</a>
					<a class="button">Decline</a>
				</td>
			</tr>
		<?php endfor; ?>
		</tbody>
	</table>
	<h2 class="colorbar-2">Billing</h2>
	<?php lorem_ipsum() ?>
	<h2 class="colorbar-3">Projects</h2>
	<?php lorem_ipsum() ?>
	<h2 class="colorbar-4">Admin</h2>
	<?php lorem_ipsum() ?>
</div>
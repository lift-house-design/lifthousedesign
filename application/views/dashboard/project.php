<table class="dataTable">
	<thead>
		<tr>
			<td>Invoice Date</td>
			<td class="center">Amount</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	<?php for($i=0;$i<5;$i++): ?>
		<tr>
			<td>07/28/2013</td>
			<td class="center">$1,099.00</td>
			<td class="right">
				<a class="primary button">Pay Online</a>
				<a class="button">Pay by Mail</a>
			</td>
		</tr>
	<?php endfor; ?>
	</tbody>
</table>
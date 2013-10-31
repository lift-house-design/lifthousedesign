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
	<!--h2 class="colorbar-1">Estimates</h2>
	<table id="estimates">
		<thead>
			<tr>
				<td>Subject</td>
				<td class="center">Date</td>
				<td class="center">Amount</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<?php for($i=0;$i<5;$i++): ?>
			<tr>
				<td>Web Foundation - NTRocks.com</td>
				<td class="center">07/02/2013</td>
				<td class="center">$4,560.00</td>
				<td class="right">
					<a class="primary button">Accept</a>
					<a class="button">Decline</a>
				</td>
			</tr>
		<?php endfor; ?>
		</tbody>
	</table-->

	<h2 class="colorbar-2">Billing</h2>
	<h3>Current Balance: $<?= $user['credit_balance'] ?> <a href="/charge/add_credits">Add Credits</a></h3>
	<?/* var_dump($user);*/?>
	<!--table id="billing">
		<thead>
			<tr>
				<td>Project Name</td>
				<td class="center">Billed to Date</td>
				<td class="center">Billable Total</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<?php for($i=0;$i<5;$i++): ?>
			<tr>
				<td>locizzle.com</td>
				<td class="center">$1,000.00</td>
				<td class="center">$30,000.00</td>
				<td class="right">
					<a class="button">View Invoices</a>
				</td>
			</tr>
		<?php endfor; ?>
		</tbody>
	</table-->
	<?php if(empty($billing)): ?>
		<p align="center">You currently have no invoices for us to display.</p>
	<?php else: ?>
		<table id="billing-invoices">
			<thead>
				<tr>
					<td>Date Issued</td>
					<td>Date Due</td>
					<td class="center">Amount</td>
					<td class="center">Status</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($billing as $invoice): ?>
				<tr>
					<td><?php echo $invoice['date_issued'] ?></td>
					<td><?php echo $invoice['date_due'] ?></td>
					<td class="center"><?php echo '$'.number_format($invoice['amount'],2) ?></td>
					<td class="center"><?php echo ucfirst($invoice['status']) ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

	<?php endif; ?>

	<h2 class="colorbar-3">Projects</h2>
	<?php if(empty($projects)): ?>
		<p align="center">You currently have no active projects for us to display.</p>
	<?php else: ?>
		<table id="projects">
			<thead>
				<tr>
					<td>Name</td>
					<!--td class="center">Hours</td>
					<td>Progress</td-->
					<td class="center">Billable Hours</td>
					<td class="center">Billable Amount</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($projects as $project_id=>$project): ?>
				<tr>
					<td><?php echo $project['name'] ?></td>
					<!--td class="center"><?php echo $project['total_hours'] ?></td>
					<td><strong style="color: red">TBD</strong></td-->
					<td class="center"><?php echo $project['total_hours'] ?></td>
					<td class="center"><?php echo '$'.number_format($project['total_amount'],2) ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

	<h2 class="colorbar-4">Admin</h2>
	<?php echo form_open('dashboard',array(
		'id'=>'admin',
	)) ?>
		<div class="field w2">
			<?php echo form_label('First Name','first_name') ?>
			<?php echo form_input(array(
				'name'=>'first_name',
				'value'=>$user['first_name'],
			)) ?>
		</div>
		<div class="field w2">
			<?php echo form_label('Last Name','last_name') ?>
			<?php echo form_input(array(
				'name'=>'last_name',
				'value'=>$user['last_name'],
			)) ?>
		</div>
		<div class="field w1">
			<?php echo form_label('Company Name','company_name') ?>
			<?php echo form_input(array(
				'name'=>'company_name',
				'value'=>$user['company_name'],
			)) ?>
		</div>
		<div class="field w2">
			<?php echo form_label('Phone Number','phone_number') ?>
			<?php echo form_input(array(
				'name'=>'phone_number',
				'value'=>$user['phone_number'],
				'class'=>'phone',
			)) ?>
		</div>
		<div class="field w2">
			<?php echo form_label('Fax Number','fax_number') ?>
			<?php echo form_input(array(
				'name'=>'fax_number',
				'value'=>$user['fax_number'],
				'class'=>'phone',
			)) ?>
		</div>
		<div class="field w2">
			<?php echo form_label('Change Password','change_password') ?>
			<?php echo form_password(array(
				'name'=>'change_password',
			)) ?>
		</div>
		<div class="field w2">
			<?php echo form_label('Confirm Password','confirm_password') ?>
			<?php echo form_password(array(
				'name'=>'confirm_password',
			)) ?>
		</div>
		<div class="buttons">
			<?php echo form_submit('update_profile','Update My Profile') ?>
		</div>
	</form>
</div>
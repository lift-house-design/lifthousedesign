<div class="spacer20"></div>

<?
if(!empty($result))
{
	?>
	<div class="add_credits_wrapper">
	<?
		if(!empty($result['error']))
		{
			?>
			<div class="info">
				<h2>Error!</h2>
				<?= $result['error'] ?>
			</div>
			<?
		}
		if($result['success'])
		{
			?>
			<div class="info">
				<h2>Success!</h2>
				$<?= $result['price'] ?> worth of credits have been added to your account.
			</div>
			<div style="text-align:center">
				Redirecting to dashboard ... 
				<span id="redir-count">3</span>s
			</div>
			<script>
			setTimeout(function(){
				$('#redir-count').html('2');
				setTimeout(function(){
					$('#redir-count').html('1');
					setTimeout(function(){
						$('#redir-count').html('0');
						window.location="/dashboard";
					},1000);
				},1000);
			},1000);
			</script>
			<?
			return;
		}
	?>
	</div>
	<?
}
?>

<form method="post">
	<div class="add_credits_wrapper home-content-no-border">
		<h2>Credit Card Information</h2>
		<hr/>
		<? 
		$card_labels = array(
			'card[first]' => array('First Name', $card['first'], 'Barrack'),
			'card[last]' => array('Last Name', $card['last'], 'Obama'),
			'card[street]' => array('Address', $card['street'], '1600 Pennsylvania Ave'),
			'card[city]' => array('City', $card['city'], 'Washington'),
			'card[state]' => array('State', $card['state'], 'DC'),
			'card[zip]' => array('ZIP', $card['zip'], '20500'),
			'card[number]' => array('Number', $card['number'], 1111111111111111),
			'card[month]' => array('Month', $card['month'], '12'),
			'card[year]' => array('Year', $card['year'], '2015'),
			'card[cvn]' => array('CVN', $card['cvn'], '111')
		);
		foreach($card_labels as $i => $v){ 
		?>
			<label for="<?= $i ?>"><?= $v[0] ?></label>
			<input name="<?= $i ?>" value="<?= $v[1] ?>" placeholder="<?= $v[2] ?>"/>
		<? 
		} 
		?>
	</div>

	<div class="spacer20"></div>

	<div class="add_credits_wrapper home-content-no-border">
		<h2>Transaction Information</h2>
		<hr/>

		<label for="product[price]">Credits to Add $</label>
        <input name="product[price]" value="<?= $product['price'] ?>" placeholder="100.00"/>
		
		<label for="card[email]">Email Address</label>
        <input name="card[email]" value="<?= $card['email'] ?>" placeholder="email@address.com"/>

		<label for="product[reference]">Reference Code</label>
        <input name="product[reference]" value="<?= $product['reference'] ?>" placeholder="485C7OW3573C897"/>
        
        <input type="hidden" name="product[quantity]" value="1"/>
		<input type="hidden" name="card[country]" value="US"/>

		<div style="float:left;text-align:center;width:100%">
			<input type="submit" name="submit" value="Add Credits" style="float:none;display:block;margin:20px auto"/>
		</div>
	</div>

	<div class="spacer20"></div>
	<? /*var_dump($post);*/ ?>
	<div class="spacer20"></div>
	<? /*if(isset($result)) var_dump($result);*/ ?>
</form>

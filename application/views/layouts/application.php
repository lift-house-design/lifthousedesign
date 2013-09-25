<?php echo doctype('html5') ?>
<head>
	<title><?php echo $meta['title'] ?></title>
	<?php echo meta(array(
		array('name'=>'Content-type','content'=>'text/html; charset=utf-8','type'=>'equiv'),
		array('name'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1','type'=>'equiv'),
		array('name'=>'viewport','content'=>'width=device-width'),
		array('name'=>'description','content'=>$meta['description']),
		array('name'=>'author','content'=>'Nick Niebaum (nickniebaum@gmail.com)'),
	)) ?>
	<?php echo css($css) ?>
	<link href='http://fonts.googleapis.com/css?family=Croissant+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Delius+Unicase' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="/assets/img/favicon.png" />
	<!--[if lt IE 9]>
		<script src="<?php echo asset('html5shiv.js','js') ?>"></script>
	<![endif]-->
</head>
<body>
	<?php echo $yield_nav ?>
	<div id="seo-content"><?=$seo_content?></div>
	<div id="main-outer-wrapper">
		<div id="title-wrapper">
			<div id="logo-above"><h2>A full service web agency</h2></div>
			<div id="logo-wrapper">
				<div id="logo">
					<a href="/" title="Lift Hosue Design">
						<img src="/assets/img/layout/logo.png"/ alt="Lift House Design">
					</a>
					<div id="logo-below">Your ascent to the summit begins here...</div>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div id="<?php echo $slug_id_string ?>">
				<?php if($slug_id_string!='site-index'): ?>
					<?php if(!empty($notifications)): ?>
						<div class="info">
							<ul>
								<li><?php echo implode('</li><li>',$notifications) ?></li>
							</ul>
						</div>
					<?php endif; ?>
					<?php if(!empty($errors)): ?>
						<div class="errors">
							The following errors occured:
							<ul><?php echo $errors ?></ul>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php echo $yield ?>

			</div>
		</div>
	</div>
	<footer>
		<div class="wrapper">
			<div id="footer-top">
				<?php echo anchor('#linkedin',img(array(
					'src'=>asset('linkedin.png','img/layout'),
				)),'target="_blank"') ?>
				<?php echo anchor('http://www.twitter.com/lifthousedesign',img(array(
					'src'=>asset('twitter.png','img/layout'),
				)),'target="_blank"') ?>
				<span id="check-us-out">...well check us out...</span>
				<?php echo anchor('http://www.facebook.com/pages/Lift-House-Design/414101198659126',img(array(
					'src'=>asset('facebook.png','img/layout'),
				)),'target="_blank"') ?>
				<?php echo anchor('http://www.youtube.com/lifthousedesign',img(array(
					'src'=>asset('youtube.png','img/layout'),
				)),'target="_blank"') ?>
			</div>
			<div id="footer-bottom">
				<div id="copyright">Copyright &copy; <?php echo date('Y') ?> | Lift House Design</div>
				<div id="links">
					<?php echo anchor('terms-conditions','Terms and Conditions',array('class'=>'popup')) ?>
					<?php echo anchor('privacy-policy','Privacy Policy',array('class'=>'popup')) ?>
					<a href="#quote" data-focus="#quote-form input[name='name']">Contact Us</a>
				</div>
			</div>
		</div>
	</footer>
	<?php echo js($js) ?>
	<?php if($ga_code!==FALSE && $dev_mode!==TRUE): ?>
	<script>
		var _gaq=[['_setAccount','<?php echo $ga_code ?>'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<?php endif; ?>
</body>
</html>
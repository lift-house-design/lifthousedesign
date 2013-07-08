<?php echo doctype('html5') ?>
<head>
	<title><?php echo $title ?></title>
	<?php echo meta(array(
		array('name'=>'Content-type','content'=>'text/html; charset=utf-8','type'=>'equiv'),
		array('name'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1','type'=>'equiv'),
		array('name'=>'viewport','content'=>'width=device-width'),
		array('name'=>'title','content'=>$meta['title']),
		array('name'=>'description','content'=>$meta['description']),
		array('name'=>'copyright','content'=>$meta['copyright']),
		array('name'=>'author','content'=>'Nick Niebaum (nickniebaum@gmail.com)'),
	)) ?>
	<?php echo css($css) ?>
	<link href='http://fonts.googleapis.com/css?family=Croissant+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Delius+Unicase' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="main-outer-wrapper">
		<div class="wrapper">
			<nav>
				<a class="services" href="#services">Services</a>
				<a class="portfolio" href="#portfolio">Portfolio</a>
				<a class="about-us" href="#about-us">About Us</a>
				<a class="quote" href="#quote" data-focus="#quote-form input[name='name']">Quote</a>
				<?php if($logged_in): ?>
					<?php echo anchor('dashboard','Dashboard','class="dashboard"') ?>
					<?php echo anchor('logout','Log Out','class="logout"') ?>
				<?php else: ?>
					<a class="login">Log In</a>
				<?php endif; ?>
			</nav>
			<div id="login">
				<?php echo form_open('login') ?>
					<?php echo form_input(array(
						'name'=>'email',
						'placeholder'=>'E-mail',
					)) ?>
					<?php echo form_password(array(
						'name'=>'password',
						'placeholder'=>'Password',
					)) ?>
					<?php echo form_submit('login','Log In') ?>
				</form>
			</div>
			<header>
				<div id="logo-above">Web Design. Web Development. Web Innovation.</div>
				<?php echo anchor('/',img(array(
					'src'=>asset('logo.png','img/layout'),
					'alt'=>'Lift House Design',
					'title'=>'Lift House Design',
				)),'id="logo"') ?>
				<div id="logo-below">Your ascent to the summit begins here...</div>
			</header>
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
				<?php echo anchor('#linked-in',img(array(
					'src'=>asset('linkedin.png','img/layout'),
				))) ?>
				<?php echo anchor('#twitter',img(array(
					'src'=>asset('twitter.png','img/layout'),
				))) ?>
				<span id="check-us-out">...well check us out...</span>
				<?php echo anchor('#facebook',img(array(
					'src'=>asset('facebook.png','img/layout'),
				))) ?>
				<?php echo anchor('#google',img(array(
					'src'=>asset('google.png','img/layout'),
				))) ?>
			</div>
			<div id="footer-bottom">
				<div id="copyright">Copyright &copy; <?php echo date('Y') ?> | Lift House Design</div>
				<div id="links">
					<?php echo anchor('terms-of-use','Terms of Use') ?>
					<?php echo anchor('privacy-policy','Privacy Policy') ?>
					<?php echo anchor('contact-us','Contact Us') ?>
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
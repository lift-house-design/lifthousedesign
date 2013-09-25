<div id="nav-wrapper">
		<div class="wrapper">
			<nav>
				<a class="top" href="#top">Top</a>
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
		</div>
	</div>
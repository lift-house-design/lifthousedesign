<div id="nav-wrapper">
		<div class="wrapper">
			<nav>
				<?php if($logged_in): ?>
					<?php echo anchor('dashboard','Dashboard','class="dashboard"') ?>
					<?php echo anchor('/authentication/log_out','Log Out','class="logout"') ?>
				<?php else: ?>
					<a class="login">Log In</a>
				<?php endif; ?>
				<a class="quote" href="#quote" data-focus="#quote-form input[name='name']">Quote</a>
				<a class="about-us" href="#about-us">About Us</a>
				<a class="portfolio" href="#portfolio">Portfolio</a>
				<a class="services" href="#services">Services</a>
				<a class="top" href="#top">Top</a>
			</nav>
			<div id="login">
				<?php echo form_open('/authentication/log_in') ?>
					<?php echo form_input(array(
						'name'=>'email',
						'placeholder'=>'E-MAIL',
					)) ?>
					<?php echo form_password(array(
						'name'=>'password',
						'placeholder'=>'PASSWORD',
					)) ?>
					<a href="javascript:void(0)" style="text-decoration:none;float:left;margin:8px 0 0 7px;font-size:12px;color:white;">
						<i>forgot password?</i>
					</a>
					<?php echo form_submit('login','Log In') ?>
				</form>
			</div>
		</div>
	</div>
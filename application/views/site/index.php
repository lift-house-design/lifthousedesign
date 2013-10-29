<div class="spacer50"></div>
<div id="ddd-graphics">
	<a id="video-link" href="http://player.vimeo.com/video/68054748?title=0&amp;byline=0&amp;portrait=0&amp;color=d9deb0&amp;autoplay=1">
		<img src="/assets/img/banner.png" alt="Full Service Web Agency" id="ddd-banner"/><br/>
		<div id="ddd-img-wrap">
			<img src="/assets/img/design.png" alt="Full Service Web Design"/>
			<img src="/assets/img/develop.png" alt="Full Service Web Development"/>
			<img src="/assets/img/deploy.png" alt="Full Service Web Deployment"/>
		</div>
		<div id="ddd-center-line"></div>
	</a>
</div>
<div class="spacer50"></div>
<div id="services"></div>
<h2 class="gear">Gear to Get You to the Summit</h2>
<div class="spacer20"></div>

<div class="home-content">
	<div class="title-wrap">
		<div class="title">
			<div class="title-text-large">
				WHAT WE DO
			</div>
			<div class="title-text-small">
				the three D's
			</div>
		</div>
	</div>

	<p>
		DESIGN
		<br/>
		<i>
			<!--Determine business requirements and create technology architecture that delivers value through automation.
			<br/-->
			Wonderfully creative and cohesive design philosophy.
		</i> 
	</p>
	<p>
		ANIMATION | BRANDING | COPY | EXPLAINER VIDEOS | INFOGRAPHICS | LOGO DESIGN
		<br/>
		MOBILE FIRST DESIGN | PHOTOGRAPHY | PRINT WORK | USER INTERFACE DESIGN | VIDEOGRAPHY
		<br/>
		WIREFRAMES | BUSINESS SPECIFICATION
	</p>
	<br/>
	<p>
		DEVELOP
		<br/>
		<i>A stable development environment.</i>
	</p>
	<p>
		CMS DEVELOPMENT | DATABASE DEVELOPMENT | E-COMMERCE | WEB APPLICATION DEVELOPMENT
		<br/>
		OPEN SOURCE TECHNOLOGIES - AJAX / JAVASCRIPT / HTML / CSS / PHP / SQL / LINUX
	</p>
	<br/>
	<p>
		DEPLOY
		<br/>
		<i>Announce your website to your market and track progress.</i>
	</p>
	<p>
		ANALYTICS | EMAIL MARKETING | HOSTING / ADMINISTRATION | PAY PER CLICK ADVERSISING
		<br/>
		SEO | SOCIAL MEDIA | SSL CERTIFICATE and INSTALLATION | TRAFFIC ANALYTICS
	</p>
</div>

<div class="spacer20"></div>
<div class="spacer20"></div>

<div class="home-content">
	<div class="title-wrap">
		<div class="title">
			<div class="title-text-large">
				HOW WE DO IT
			</div>
			<div class="title-text-small" style="padding-right:1px">
				efficient work process
			</div>
		</div>
	</div>
	<p>
		Our efficient, and stable development method enables us to build the best possible website for each and every customer.
		Our proven method allows for the most competitive and transparent pricing possible, providing you with lower cost, higher quality work.
		Additionally, our resources allow us to scale up, meeting the demands of any customer.
	</p>
	<br/>
	<p>
		FRAME WORK
		<br/>
		<i>The foundation.</i> 
	</p>
	<p>
		Because we make it so easy to leave us, we work hard to keep you as a customer. 
		Our framework provides the foundation for developing dependable, portable websites. 
		The code that we develop is written in a thoughtful and organized way. 
		Other developers are able to quickly understand and develop new features. 
		Our framework not only ensures great performance with a small footprint, but allows for future “renovations” as well.
	</p>
	<br/>
	<p>
		PROJECT TEMPLATE
		<br/>
		<i>The blueprint.</i>
	</p>
	<p>
		Our project template allows us to not only organize, but track the progress of your site. 
		Through planning, organizing, and managing the development of your site, we are able to keep your project on track, and on budget. 
		Additionally, we keep each customer up-to-date every step of the way. 
		With our updates you will be notified every time a task has been completed, keeping you out of the dark.
	</p>
	<br/>
	<p>
		CODE LIBRARY
		<br/>
		<i>The toolbox.</i>
	</p>
	<p>
		Our code library contains all of the necessary components to get your website working for you. 
		With these customizable features, we will automate many of the daily, time consuming tasks occupying your time. 
		User authorization, email management, messaging, e-commerce, social media integration, blogs, and much more.

	</p>
	<!--br/>
	<p>
		urCMS
		<br/>
		<i>Tailored just for you.</i>
	</p>
	<p>
		urCMS, our content management system, provides each customer with the easiest way to update and manage their website. We tailor each customers Content Management System to only include features relevant to their site, making it urCMS.
		<br/>
		Don’t have any programmer experience? No problem. urCMS is super user friendly, making site updates as easy as sending an email.
		<br/>
		From our email and social media manager, to our text editor, urCMS will save you time, and money. By eliminating the time typically spent learning those other bulky content management systems, you will have more time to spend with your growing customer base. Perfect for your new lead generating website.
	</p-->
</div>

<div class="spacer50"></div>
<div id="about-us"></div>
<h2 class="love">We Love What We Do</h2>
<div class="spacer20"></div>

<!--table id="employees">
	<tr>
		<td>
			<div class="employee-img">
			</div>
			<br/>
			&nbsp;TARA
			<br/>
			<i>design</i>
		</td>
		<td>
			<div class="employee-img">
			</div>
			<br/>
			&nbsp;BAIN
			<br/>
			<i>develop</i>
		</td>
		<td>
			<div class="employee-img">
			</div>
			<br/>
			&nbsp;MIKE
			<br/>
			<i>deploy</i>
		</td>
	</tr>
</table>

<div class="spacer20"></div-->

<div class="home-content-no-border">
	SO, WHO IS LIFT HOUSE DESIGN?
	<br/><br/>
	<i>We are all things web.</i>
	<br/>
	Not only are we great at providing innovative web solutions for your business, we love doing it! Branding, database development, pay per click management; we are your one stop shop for all things web. Our goal is to help you not only meet, but exceed your business goals. By utilizing web technology, we will automate and streamline all those time-consuming, and tedious tasks depleting your revenue stream.
</div>

<?php if(!empty($portfolio)): ?>
	<div class="spacer50"></div>
	<div id="portfolio"></div>
	<h2 class="latest">Just a Few of Our Latest</h2>
	<div class="spacer20"></div>
	<div id="latest">
		<?php foreach($portfolio as $work): ?>
			<a href="<?php echo site_url('site/portfolio_details/'.$work['id']) ?>" class="work">
				<?php echo img($work['image']) ?>
				<span class="caption">Learn More</span>
			</a>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<div class="spacer20"></div>

<div class="home-content-clear">
	<p>
		WANT TO LEARN MORE?
		<br/>
		<i>check out our:</i>
	</p>
	<a href="/blog" target="_blank" title="All Things Web Blog">
		<img src="/assets/img/blog.png"/>
	</a>
</div>

<div class="spacer50"></div>
<div id="quote"></div>

<form id="quote-form" class="well" method="post" action="/">
	<?php if($this->input->post('send_quote')): ?>
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
	<span class="font-oleo-script-swash-caps">tell us about your project:</span>
	<div class="clear">
		<div class="float-left">
			<input type="text" name="name" placeholder="Name *" />
			<input type="text" name="company" placeholder="Company" />
			<input type="text" name="website" placeholder="Web site" class="url" />
			<input type="text" name="email" placeholder="E-mail *" />
			<input type="text" name="phone" placeholder="Phone" class="phone" />
		</div>
		<div class="float-right">
			<textarea name="project_info" placeholder="Project info *"></textarea>
		</div>
	</div>
	<input type="submit" name="send_quote" value="Send" />
</form>

<div class="spacer20"></div>

<a href="#quote">
	<img id="contact-us-floater" src="/assets/img/contact_us.png"/>
</a>
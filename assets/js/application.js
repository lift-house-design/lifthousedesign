$(function(){
	/*
	|--------------------------------------------------------------------------
	| Navigation
	|--------------------------------------------------------------------------
	*/
	// Determine if they are on the homepage, as that will change the
	// link functionality
	var on_homepage=$('#services, #portfolio, #about-us, #quote').length==4;

	// Define a scroll-to function, as it is used in more than one spot
	function scroll_to_element(target_selector,callback)
	{
		if(on_homepage)
		{
			if($(target_selector).length)
			{
				var offset=$(target_selector).offset();

				$('html, body').animate({
					scrollTop: offset.top-50,
				},{
					duration: 1000,
					easing: 'easeOutCirc',
					complete: function(){
						if(typeof callback=='function')
							callback();
					},
				});

				return true;
			}
		}
		else
		{
			window.location.href='/'+target_selector;
		}

		return false;
	}

	// Find all links with an href beginning with hashtag
	$('nav a').each(function(){
		var href=$(this).attr('href');

		if(href && href[0]=='#')
		{
			// Apply the scroll-to functionality
			$(this).click(function(){
				var target_selector=$(this).attr('href');
				scroll_to_element(target_selector,function(){
					
				});
			});
		}
	});

	// Scroll to the target if page is loaded with a hashtag
	if(window.location.hash)
	{
		scroll_to_element(window.location.hash);
	}

	// Apply drop down functionality for the login menu
	$('nav a.login').click(function(){
		$('#login')
			.show()
			.toggleClass('visible');

		if($('#login').hasClass('visible'))
			$('#login input[name="email"]').focus();
	});
});
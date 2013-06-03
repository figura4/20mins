<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<!-- Head
 ================================================== -->
<?php $this->renderPartial('/protected/views/layouts/_head'); ?> 

<body>

	<!-- Primary Page Layout
	================================================== -->
	<div id="wrap">
		
		<!-- Header/Main Nav
		================================================== -->
		<?php $this->renderPartial('/protected/views/layouts/_header'); ?> 
				
		<!-- Main Content
		================================================== -->
		<div class="container">
			<div class="eleven columns">
				<div class="blog-post">
					<div class="date">
						<span class="month">JAN</span>
						<span class="day-year">29th, 2033</span>
					</div>
					<div class="post">
						<div class="image-container">
							<img src="img/blog.jpg" alt="" />
							<div class="blog-read-more"></div>
						</div>
						<div class="meta">
							<ul>
								<li><i class="icon-pencil"></i> Author: <span><a href="#">Admin</a></span></li>
								<li><i class="icon-tasks"></i> Category: <span><a href="#">Web</a></span></li>
								<li><i class="icon-tag"></i> Tags: <span><a href="#">html,</a> <a href="#">css,</a> <a href="#">recursion</a></span></li>
								<li><i class="icon-comments"></i> Comments: <span><a href="#">6</a></span></li>
							</ul>
						</div>
						<h3><a href="#">This is a blog post!</a></h3>
						<p>Aenean pretium accumsan urna, nec vestibulum orci bibendum ac. Nullam condimentum ligula id velit rhoncus dictum. Pellentesque nisi massa, gravida et euismod in, venenatis quis massa. Donec dignissim rutrum tempor. Quisque malesuada felis quis nulla ullamcorper non sodales risus tincidunt. Nullam eu nisl volutpat diam volutpat varius ac non augue. Donec venenatis posuere sem sed mollis. Donec eu nulla massa, id varius orci. Phasellus blandit sagittis vehicula...</p>
						<a href="#" class="button">Read more</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="blog-post">
					<div class="date">
						<span class="month">JAN</span>
						<span class="day-year">29th, 2013</span>
					</div>
					<div class="post">
						<div class="image-container">
							<img src="img/blog.jpg" alt="" />
							<div class="blog-read-more"></div>
						</div>
						<div class="meta">
							<ul>
								<li><i class="icon-pencil"></i> Author: <span><a href="#">Admin</a></span></li>
								<li><i class="icon-tasks"></i> Category: <span><a href="#">Web</a></span></li>
								<li><i class="icon-tag"></i> Tags: <span><a href="#">html,</a> <a href="#">css,</a> <a href="#">recursion</a></span></li>
								<li><i class="icon-comments"></i> Comments: <span><a href="#">2</a></span></li>
							</ul>
						</div>
						<h3><a href="#">This is a blog post!</a></h3>
						<p>Aenean pretium accumsan urna, nec vestibulum orci bibendum ac. Nullam condimentum ligula id velit rhoncus dictum. Pellentesque nisi massa, gravida et euismod in, venenatis quis massa. Donec dignissim rutrum tempor. Quisque malesuada felis quis nulla ullamcorper non sodales risus tincidunt. Nullam eu nisl volutpat diam volutpat varius ac non augue. Donec venenatis posuere sem sed mollis. Donec eu nulla massa, id varius orci. Phasellus blandit sagittis vehicula...</p>
						<a href="#" class="button">Read more</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="blog-post">
					<div class="date">
						<span class="month">JAN</span>
						<span class="day-year">29th, 2013</span>
					</div>
					<div class="post">
						<div class="image-container">
							<iframe src="http://player.vimeo.com/video/58445885" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<div class="blog-read-more"></div>
						</div>
						<div class="meta">
							<ul>
								<li><i class="icon-pencil"></i> Author: <span><a href="#">Admin</a></span></li>
								<li><i class="icon-tasks"></i> Category: <span><a href="#">Web</a></span></li>
								<li><i class="icon-tag"></i> Tags: <span><a href="#">html,</a> <a href="#">css,</a> <a href="#">recursion</a></span></li>
								<li><i class="icon-comments"></i> Comments: <span><a href="#">8</a></span></li>
							</ul>
						</div>
						<h3><a href="#">This is a video blog post!</a></h3>
						<p>Aenean pretium accumsan urna, nec vestibulum orci bibendum ac. Nullam condimentum ligula id velit rhoncus dictum. Pellentesque nisi massa, gravida et euismod in, venenatis quis massa. Donec dignissim rutrum tempor. Quisque malesuada felis quis nulla ullamcorper non sodales risus tincidunt. Nullam eu nisl volutpat diam volutpat varius ac non augue. Donec venenatis posuere sem sed mollis. Donec eu nulla massa, id varius orci. Phasellus blandit sagittis vehicula...</p>
						<a href="#" class="button">Read more</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="pagination">
					<a href="#">Prev</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<span class="active_link">3</span>
					<span class="disabled_pagination">Next</span>
				</div>
			</div>
			
			<!--Sidebar-->
			<aside class="sidebar">
				<div class="offset-by-one four columns">
					<div class="widget">
						<h5>Categories</h5>
						<ul>
							<li><a href="#">Web</a></li>
							<li><a href="#">Digital</a></li>
							<li><a href="#">Articles</a></li>
							<li><a href="#">Photography</a></li>
						</ul>
					</div>
					<div class="widget">
						<h5>Featured Post</h5>
						<div class="featured-post">
							<img src="img/nypd-featured.jpg" alt="" />
							<h5><a href="#">This is a blog post!</a></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultricies, diam...</p>
							<div class="clearfix"></div>
						</div>
						<div class="featured-post-date">
							January 29th, 2033
						</div>
					</div>
					<div class="widget">
						<h5>Flickr Feed</h5>
						<ul class="flickr"></ul>
					</div>
					<div class="widget">
						<h5>Text Widget</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at lacinia purus. Donec ac mauris et lacus pulvinar pulvinar eu in dui. Cras lacinia ultricies elit, commodo fermentum lacus euismod eget.</p>
					</div>
				</div>
			</aside>
			<div class="bottom"></div>
		</div>
		
		<!-- Footer
		================================================== -->
		<?php $this->renderPartial('/protected/views/layouts/_footer'); ?> 

	</div><!-- End Wrap -->

	<!-- Javascript/jQuery
	================================================== -->
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.tweet.js"></script>
	<script type="text/javascript" src="js/jquery.tipTip.minified.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.min.js"></script>
	<script type="text/javascript" src="js/jflickrfeed.min.js"></script>
	<script type="text/javascript" src="js/selectnav.min.js"></script>
	<script type="text/javascript" src="js/respond.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script type="text/javascript" src="js/gmap3.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>

<!-- End Document
================================================== -->
</body>
</html>
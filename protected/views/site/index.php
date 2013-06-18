			<div class="eleven columns">
				<?php foreach ($contents as $content) { ?>
				<div class="blog-post">
					<div class="date">
						<span class="month">JAN</span>
						<span class="day-year">29th, 2033</span>
					</div>
					<div class="post">
						<div class="image-container">
							<img src="images/subtract/blog.jpg" alt="" />
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
						<h3><a href="#"><?php echo $content->page_title; ?></a></h3>
						<p>Aenean pretium accumsan urna, nec vestibulum orci bibendum ac. Nullam condimentum ligula id velit rhoncus dictum. Pellentesque nisi massa, gravida et euismod in, venenatis quis massa. Donec dignissim rutrum tempor. Quisque malesuada felis quis nulla ullamcorper non sodales risus tincidunt. Nullam eu nisl volutpat diam volutpat varius ac non augue. Donec venenatis posuere sem sed mollis. Donec eu nulla massa, id varius orci. Phasellus blandit sagittis vehicula...</p>
						<a href="#" class="button">Read more</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } ?>
				
				<?php // display pagination ?>
				<?php $this->widget('CustomPager', array(
						'pages' => $pages,
						'currentPage'=>$pages->getCurrentPage(),
						'itemCount'=>$pages->itemCount,
						'id'=>'pagination',
						'hiddenPageCssClass'=>'disabled_pagination',
						'selectedPageCssClass'=>'active_link',
						'nextPageLabel'=>'&gt;&gt;',
						'prevPageLabel'=>'&lt;&lt;',
						'pageSize'=>Yii::app()->params['pageSize'],
				)) ?>
			</div>




				<!-- 
				<div id="pagination">
					<a href="#">Prev</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<span class="active_link">3</span>
					<span class="disabled_pagination">Next</span>
				</div>
				 -->

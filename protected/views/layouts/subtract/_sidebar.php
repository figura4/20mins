			<aside class="sidebar">
				<div class="offset-by-one four columns">
					
					<?php 
					$quote=Quote::model()->getRandomQuote();
					if (!is_null($quote)) {					
					?>
					<div class="widget">
						<h5>Random Quote</h5>
						<blockquote>
						<?php 
						echo $quote->body;
						if (!isset($quote->source) || trim($quote->source)==='') {
						?>
							<br/><br/>
							<i class="icon-double-angle-right"></i> 
							<?php echo CHtml::link($quote->review->full_title, $quote->review->getUrl())?>
						<?php } ?>
						</blockquote>
					</div>
					<?php } ?>
					
					<div class="widget">
						<a class="twitter-timeline" href="https://twitter.com/figura_4" data-widget-id="349907951680618498">Tweets di @figura_4</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</aside>

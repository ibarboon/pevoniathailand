		</div>
		<footer id="footer">
			<div class="container">
				<div class="four columns">
					<img id="logo-footer" src="<?php echo base_url('/assets/images/pevonia-flower-02.png'); ?>" alt="Pevonia Thailand" />
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				</div>
				<div class="four columns">
					<h4>CONTACT INFO</h4>
					<ul class="contact-details-alt">
						<?php
							foreach($contact_list as $contact):
								if(strpos($contact['option_value'],'|')) {
									$display_value = explode('|', $contact['option_value']);
									echo '<li><i class="'.$display_value[0].'"></i><p><strong>'.$contact['option_key'].'</strong>'.$display_value[1].'</p></li>';							
								}
							endforeach;
						?>
					</ul>
				</div>
				<div class="four columns"></div>
				<div class="four columns">
					<h4>Social Network</h4>
					<ul class="social-network-icons">
						<li><a href="https://www.facebook.com/pevoniathailand"><i class="fa fa-facebook fa-3x"></i></a></li>
						<li><a href="http://instagram.com/pevoniathailand/"><i class="fa fa-instagram fa-3x"></i></a></li>
						<li><a href="https://twitter.com/PevoniaThailand"><i class="fa fa-twitter fa-3x"></i></a></li>
					</ul>
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpevoniathailand&amp;width&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;" allowTransparency="true"></iframe>
				</div>
			</div>
		</footer>
		<footer id="footer-bottom">
			<div class="container">
				<div class="eight columns">
					<div class="copyright">Copyright &copy; 2012 <a href="javascript:void(0);">Pevonia (Thailand) Co., Ltd.</a>. All Rights Reserved.</div>
				</div>
				<div class="eight columns">
<!-- 					<nav id="sub-menu"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="#">ENG</a></li> -->
<!-- 							<li><a href="#">THA</a></li> -->
<!-- 						</ul> -->
<!-- 					</nav> -->
				</div>
			</div>
		</footer>
	</body>
</html>
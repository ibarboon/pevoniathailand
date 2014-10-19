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
				<div class="four columns">
					<h4>Social Network</h4>
					<ul class="social-network-icons">
						<li><a href="https://www.facebook.com/pevoniathailand"><i class="fa fa-facebook fa-3x"></i></a></li>
						<li><a href="http://instagram.com/pevoniathailand/"><i class="fa fa-instagram fa-3x"></i></a></li>
						<li><a href="https://twitter.com/PevoniaThailand"><i class="fa fa-twitter fa-3x"></i></a></li>
					</ul>
				</div>
				<div class="four columns">
					<nav class="widget-search">
						<form method="get" action="404-page.html">
							<button class="search-btn"></button>
							<input type="text" value="Search" onfocus="if(this.value=='Search')this.value='';" onblur="if(this.value=='')this.value='Search';" class="search-field">
						</form>
					</nav>
				</div>
			</div>
		</footer>
		<footer id="footer-bottom">
			<div class="container">
				<div class="eight columns">
					<div class="copyright">Copyright &copy; 2012 <a href="javascript:void(0);">Pevonia (Thailand) Co., Ltd.</a>. All Rights Reserved.</div>
				</div>
				<div class="eight columns">
					<nav id="sub-menu">
						<ul>
							<li><a href="#">EN</a></li>
							<li><a href="#">TH</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
	</body>
</html>
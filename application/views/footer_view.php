		</div>
		<footer id="footer">
			<div class="container">
				<div class="four columns">
					<img id="logo-footer" src="<?php echo base_url('/assets/images/pevonia-flower-02.png'); ?>" alt="Pevonia Thailand" />
					<p>
						<?php echo substr($why_pevonia['content_body'], 0, 128); ?>
					</p>
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
						<?php
							foreach ($social_network_list as $social_network) {
								$sn = explode('|', $social_network['option_value']);
						?>
						<li><a href="<?php echo $sn[1]; ?>"><img src="<?php echo base_url('assets/images/'.$sn[0]); ?>"></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="four columns">
					<nav class="widget-search">
						<form method="post" action="<?php echo site_url($default_language.'/search'); ?>">
							<button type="submit" class="search-btn"></button>
							<input type="text" name="in-keyword" value="Search" onfocus="if(this.value=='Search')this.value='';" onblur="if(this.value=='')this.value='Search';" class="search-field">
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
							<li><a href="<?php echo site_url('en/'.$current_view); ?>">EN</a></li>
							<li><a href="<?php echo site_url('th/'.$current_view); ?>">TH</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
	</body>
</html>
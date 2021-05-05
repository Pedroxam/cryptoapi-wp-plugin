<div class="wrap crypthelp">

	<h1>CryptApi Shortcode Help</h1>
	
	<br/>
	<br/>
	
	<div>- All result is new deposit address.</div>
	<div>- Leave callback url empty if you want to use default plugin callback (all callback logs can be display in logs page).</div>
	<div>- Replace your details with red words.</div>
	
	<hr/>
	<h4>
		Generate new address:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="ETH" wallet="d3123456789..."]
		</code>
	</p>
	<hr/>
	
	<h4>
		Generate new address with callback:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" callback="<span>YOUR_CALLBACK_URL</span>"]
	</code>

	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query"]
		</code>
	</p>
	The URL the callbacks will be sent to. Must be a valid URL
	<hr/>
	
	<h4>
		Generate new address with email:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" email="<span>EMAIL</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." email="name@email.com"]
		</code>
	</p>
	E-mail address to receive payment notifications (default: admin email: <b><?php echo get_option('admin_email'); ?></b> )
	<hr/>
	
	<h4>
		Generate new address with pending notified:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" callback="<span>YOUR_CALLBACK_URL</span>" pending="<span>1</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query" pending="1"]
		</code>
	</p>
	Set this to 1 if you want to be notified of pending transactions (before they're confirmed) (default: False)
	<hr/>
	
	<h4>
		Generate new address with confirmations notified:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" callback="<span>YOUR_CALLBACK_URL</span>" confirmations="<span>1</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." confirmations="1"]
		</code>
	</p>
	Number of confirmations you want before receiving the callback (Min. 1) (default: 1)
	<hr/>
	
	
	<h4>
		Generate new address with priority:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" priority="<span>fast, default, economic</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." priority="fast"]
		</code>
	</p>
	Set confirmation priority, needs to be one of ['fast', 'default', 'economic'] (Attention: this will impact network fees) - (default: default)
	<hr/>
	
	<h4>
		Generate new address with post method:
	</h4>
	
	<code>
		[cryptapi coin="<span>YOUR_COIN</span>" wallet="<span>YOUR_WALLET</span>" callback="<span>YOUR_CALLBACK_URL</span>" post="<span>1</span>"]
	</code>
	
	<p>
		Example:
	</p>
	<p>
		<code>
			[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query" post="1"]
		</code>
	</p>
	Set this to 1 if you wish to receive the callback as a POST request (default: GET)
	<hr/>
	
	
	<h2>Using CryptApi Shortcode in Pages</h2>
	
	<b>
	<?php echo htmlentities("<?php echo do_shortcode('[cryptapi coin=\"YOUR_COIN\" wallet=\"YOUR_WALLET\" callback=\"YOUR_CALLBACK_URL_OR_LEAVE_EMPTY\"]'); ?>") ?>
	<b>
	
	<br/>
	<br/>
	<div>
		Result can be new deposit address.
	</div>
	
</div>

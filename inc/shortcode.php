<?php

function generateAddress($args)
{
	$coin = (isset($args['coin']) && !empty($args['coin'])) ? $args['coin'] : null;
	$wallet = (isset($args['wallet']) && !empty($args['wallet'])) ? $args['wallet'] : null;
	$callback = (isset($args['callback']) && !empty($args['callback'])) ? $args['callback'] : null;
	$email = (isset($args['email']) && !empty($args['email'])) ? $args['email'] : null;
	$pending = (isset($args['pending']) && !empty($args['pending'])) ? $args['pending'] : FALSE;
	$confirmations = (isset($args['confirmations']) && !empty($args['confirmations'])) ? $args['confirmations'] : null;
	$priority = (isset($args['priority']) && !empty($args['priority'])) ? $args['priority'] : null;
	$box = (isset($args['box']) && !empty($args['box'])) ? true : false;

	if( is_null($coin) or is_null($wallet) ){
		exit("Please read cryptApi help.");
	}

	$coin = strtolower($coin);

	$allowed_coins = [ 'btc', 'usdt', 'eth', 'trx', 'ltc', 'bch' ];

	if(!in_array($coin, $allowed_coins)){
		echo "Please use one of the following coins: btc, usdt, eth, trx, ltc, bch";
	}

	if(is_null($callback)){
		$callback = home_url() . '/?' . get_option('cryptapi_secret_callback');
	}

	$callback = urlencode($callback);

	$allowed_prority = [ 'fast', 'default', 'economic' ];

	if(!is_null($priority)){
		if(!in_array($priority, $allowed_prority)){
			$priority = 'default';
		}
	}
	else {
		$priority = 'default';
	}

	if(is_null($email))
		$email = get_option('admin_email');

	$api = "https://api.cryptapi.io/$coin/create/?callback=$callback&address=$wallet&pending=$pending&email=$email&priority=$priority";

	$get = wp_remote_get($api);

	$body = wp_remote_retrieve_body($get);

	$decode = json_decode($body, true);
	
	if(isset($decode['reason'])){
		echo $decode['reason'];
	}
	else if(isset($decode['error'])){
		echo $decode['error'];
	}
	else {
		if($box)
			echo generateBox($decode['address_in'], $coin);
		else
			echo $decode['address_in'];
	}
	
	return null;
}

function generateBox($address, $coin){
	return '
		<div class="cryptbox">
			<div class="icon">
				<img class="logo" border="0" alt="'.$coin.' Payment System" src="'.CRYPTO_URL . 'images/' . $coin . '.png'.'" />
			</div>
			<div class="desc">
				Please Send '.strtoupper($coin).' to following address:
			</div>
			<div class="address">
				'.$address.'
			</div>
		</div>';
}

generateAddress($args);

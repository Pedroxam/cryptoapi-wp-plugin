# cryptoapi-wp-plugin
CryptoApi Wallet Generator Wordpress Plugin


CryptApi Shortcode Help


- All result is new deposit address.
- Leave callback url empty if you want to use default plugin callback (all callback logs can be display in logs page).
- Replace your details with red words.
Generate new address:
- Use box="true" for showing deposit box.

[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET"]

Example:

[cryptapi coin="ETH" wallet="d3123456789..."]

Generate new address with callback:
[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query"]

The URL the callbacks will be sent to. Must be a valid URL
Generate new address with email:
[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" email="EMAIL"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." email="name@email.com"]

E-mail address to receive payment notifications (default: admin email )

Generate new address with pending notified:

[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL" pending="1"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query" pending="1"]

Set this to 1 if you want to be notified of pending transactions (before they're confirmed) (default: False)

Generate new address with confirmations notified:

[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL" confirmations="1"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." confirmations="1"]

Number of confirmations you want before receiving the callback (Min. 1) (default: 1)

Generate new address with priority:

[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" priority="fast, default, economic"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." priority="fast"]

Set confirmation priority, needs to be one of ['fast', 'default', 'economic'] (Attention: this will impact network fees) - (default: default)

Generate new address with post method:

[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL" post="1"]

Example:

[cryptapi coin="BTC" wallet="d3123456789..." callback="http://myhost.com/query" post="1"]

Set this to 1 if you wish to receive the callback as a POST request (default: GET)

Using CryptApi Shortcode in Pages

with deposit box:

do_shortcode('[cryptapi box="true" coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL_OR_LEAVE_EMPTY"]');

without deposit box:

do_shortcode('[cryptapi coin="YOUR_COIN" wallet="YOUR_WALLET" callback="YOUR_CALLBACK_URL_OR_LEAVE_EMPTY"]');

Result can be new deposit address.

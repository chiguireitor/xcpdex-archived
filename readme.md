## XCP DEX

XCP DEX is a Counterparty (XCP) Decentralized Exchange Explorer.

It will also help you generate a raw order tx outside of CW.

Demo: https://xcpdex.com/

XCP DEX is built using Laravel 5.2 (a PHP framework) and relies heavily on the use of public development servers.

By default, it uses Coindaddy.io, but any Counterparty API can be switched in through the .env file.

Blockchain.info is hardcoded right now, for checking Bitcoin balances, but that may change as well.

This is my version 0.1 for Devparty, a Counterparty Foundation contest held on Feb. 9 2016.

## Dependencies

`fguillot/json-rpc` - For consuming Counterparty API

`anlutro/curl` - For consuming Blockchain.info API

`spatie/laravel-responsecache` - For caching views

## Additional

I used Laravel because it's very extensible and I know how to use it. But this application has no models, no login, or database. It should just work out of the box, if it can connect to a Counterparty and Counterblock API. Most of the routing is dynamic with cached results and every 5-15 minutes (set in config/laravel-responsecache.php).

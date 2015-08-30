Why?
===

According to creator of awesome [Phpdotenv](https://github.com/vlucas/phpdotenv), the library was never meant to be used in production. I, however, would like to that to maintain the separation of config from code and to keep my development workflow as close to production as possible.

A lot of shared hostings (including mine) does not allow `putenv` function due to security, so I had to have my way of getting/setting superglobals with Phpdotenv. But as most of that is hardcoded to Phpdotenv, the easiest way I could think of was to write a light wrapper around the methods in question to allow custom callbacks.

Consider this library deprecated anytime the owner of Phpdotenv incorporates similar functionality. 

What is this used for?
---

More info about Phpdotenv at the original repo: [Phpdotenv](https://github.com/vlucas/phpdotenv)

Installation
===

	composer install cibulka/phpnotenv
	
Commit test.
Want to maintain the workflow [Phpdotenv](https://github.com/vlucas/phpdotenv) in your production code, but can't use `putenv()` functions due to server security limitations?

Well, I had this problem, so I created a very simple subclass library around excellent Phpdotenv, that allows you to set custom callbacks for your superglobal setters/getters.

More info about Phpdotenv at the original repo: [Phpdotenv](https://github.com/vlucas/phpdotenv)

Consider this library deprecated anytime the owner of Phpdotenv incorporates similar functionality. 

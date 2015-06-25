Building a SMS opt in and opt out system in Symfony
===================================================

Welcome to a simple Symfony tutorial on using Clickatell's API to have your user 
opt in and out of SMS marketing/notifications.

Getting started
---------------

First step is to create a new Symfony project – here I used the composer method.
    
    $ composer create-project symfony/framework-standard-edition sms_opt_in_and_out
    
We'll also need the Clickatell php library installed into the project - easy with composer.

    $ o	composer require arcturial/clickatell
 
 
Next you'll need to create a bundle to do your work in, I called mine Clickatell/SMSOptInAndOutBundle 
with ClickatellSMSOptInAndOutBundle as the "short" hand name - Just follow the steps prompted.
    
    $ php app/console generate:bundle --namespace=Clickatell/SMSOptInAndOutBundle
    
Lets get coding
---------------

First add the bundles to the AppKernal - our own and the Clickatell one.

        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            // Our new Bundles
            new Clickatell\SMSOptInAndOutBundle\ClickatellSMSOptInAndOutBundle(),
            new Clickatell\Symfony\ClickatellBundle(),
        );

We also need some config for the Clickatell bundle - I opted to created a new file and import it

        - { resource: clickatell.yml }
        
I decided to create 2 tables for my project - on for logging incoming text messages (MO) and one for the subscribers.
See the classed in src/Clickatell/SMSOptInOutBundle/Entity/* for more detail.

You can created them manualy or my using this command:

    $ php app/console doctrine:database:create
    
Now I kept it simple and created two controllers - one for testing purposes and one as the callback url from Clickatell.
See 

    Clickatell/SMSOptInAndOutBundle/Controller/CallbackController.php
    
    Clickatell/SMSOptInAndOutBundle/Controller/DefaultController.php
    
The callback controller user the Keyword Manager and it's strategies to identify and save/remove subscribers from the database.

see Clickatell/SMSOptInAndOutBundle/Keyword/* for more detail.

Don't forget your configs for routing:  

    Clickatell/SMSOptInAndOutBundle/Resources/config/routing.yml

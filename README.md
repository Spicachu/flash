# flash
A flash messagae Anax module

# A module for Anax
This flash module for your Anax MVC is composed to you by Olivia V. n.a.g.i@live.se.

# How to install

* Use composer and packagist

* Open the /webroot folder where you will find a demo file and a quick view file

* Copy and paste flash-demo.php to your own /webroot folder for testing

* If the site isn't displayed correctly, move the CFlash.php and CFlashSession to your own /src folder


In composer: 

COMING SOON


# The module 
There are two classes - CFlash.php and CFlashSession. They're both called by the webroot file flash-demo.php. 

The style sheet is called in flash-demo.php as well, "$app->theme->addStylesheet('../vendor/olve/webroot/css/flash.css'"

# Functions
This module will sent success, notice and error messages. It's based off a Phalcon tutorial. 

# Sessions
The main code in flash-demo.php will call CFlashSession to ensure that the notice message has survived the redirect.

# Messages

    $content .= $app->flash->success('Success message!');
    $content .= $app->flash->notice('Notice message.');
    $content .= $app->flash->error('Error message');
  
  
# CSS file
Styles all the messages in a separate letters matter.

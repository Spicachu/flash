<?php

// load config
require __DIR__.'/config_with_app.php'; 

// load stylesheet
$app->theme->addStylesheet('../vendor/olve/webroot/css/flash.css');

// Set page title
$app->theme->setTitle("Test flash messages");

// instantiate a flash messenger 
$di->setShared('flash', function() {
    $flash = new \Anax\Flash\CFlash();
    return $flash;
});

// instantiate a flash messenger which uses the session
$di->setShared('sessionflash', function() use ($di) {
    $sessionflash = new \Anax\Flash\CFlashSession();
    $sessionflash->setDI($di);
    return $sessionflash;
});


$app->router->add('', function() use ($app) {

    $title = "Examples of Flash Message use";

    $content = "";
    $content .= $app->flash->success('Success message!');
    $content .= $app->flash->notice('Notice message.');
    $content .= $app->flash->error('Error message');
    
    $content .= "<p>Test different implementations of Flash message services using the links.</p>";
    
    
    $links = [
                [
                    'href' => $app->url->create(''), 'text' => 'All Messages!',
                ],
                [
                    'href' => $app->url->create('flash-redirect'), 'text' => 'Send message with CFlashSession.',
            ],
			];
    
    $app->views->add('default/page', [
        'title' => $title,
        'content' => $content,
        'links' => $links
    ]);
});

// test a flash stored in session surviving a redirect
// redirect
$app->router->add('flash-redirect', function() use ($app) {
    
    // use flash with session
    $app->sessionflash->notice('A notice message that survived a redirect!');
        
    //create url
    $url = $app->url->create('flash-redirect-target');
    // redirect
    $app->response->redirect($url);
});

$app->router->add('flash-warning', function() use ($app) {
    
    // use flash with session
    $app->sessionflash->warning('Orange warning message!');
        
    //create url
    $url = $app->url->create('flash-warning');
    // redirect
    $app->response->redirect($url);
});

// target route of redirect test
$app->router->add('flash-redirect-target', function() use ($app) {

    $title = "This flash message was sent through the session";
    
    $content = "";

    // output message using output
    $content .= $app->sessionflash->output();

    // clear message from session
    $app->sessionflash->flush();
    
    $links = [
                [
                    'href' => $app->url->create(''), 'text' => 'All Messages!',
                ],
                [
                    'href' => $app->url->create('flash-redirect'), 'text' => 'Send message with CFlashSession.',
                ],
            ];
    
    $app->views->add('default/page', [
        'title' => $title,
        'content' => $content,
        'links' => $links
    ]);
});


$app->router->handle();
$app->theme->render();

<?php
include "../src/CFlash.php";

$flash = new \Anax\FLash\CFlash();
$flash->success('Success message!');
$flash->notice('Notice message.');
$flash->error('Error message');
    
echo "
<!doctype html>
<meta charset=utf8>
<link rel='stylesheet' type='text/css' href='css/flash.css'>
<title>Test Flash message</title>
<h1>Test Flash message</h1>
{$flash->output()}
    ";
<?php
echo "\n";
require_once 'vendor/autoload.php';
include_once 'config.php';

$user = (isset($user) ? $user : 'my.username');
$pass = (isset($pass) ? $pass : 'my.password');

//define the driver
//$driver = new \Behat\Mink\Driver\GoutteDriver();
$driver = new \Behat\Mink\Driver\SahiDriver('firefox');

//init session:
$session = new \Behat\Mink\Session($driver);

//start session:
$session->start();

//open myNAPLS in browser:
$session->visit('https://my.napls.us');

//get page source
$page = $session->getPage();

//enter the username
$el = $page->find('css', '#logon_user');
$el->setValue($user);

//enter the password
$el2 = $page->find('css', '#logon_pass');
$el2->setValue($pass);

//press the sign in button
$el3 = $page->findButton('Login');
$el3->press();

echo "\n\n";
?>

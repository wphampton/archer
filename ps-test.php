<?php
echo "\n";
require_once 'vendor/autoload.php';
include_once 'config.php';

$user = (isset($psUser) ? $psUser : 'my.username');
$pass = (isset($psPass) ? $psPass : 'my.password');
$psCreds = $user . ';' . $pass;

//define the driver
//$driver = new \Behat\Mink\Driver\GoutteDriver();
$driver = new \Behat\Mink\Driver\SahiDriver('firefox');

//init session:
$session = new \Behat\Mink\Session($driver);

//start session:
$session->start();

//open PowerSchool in browser:
$session->visit('https://ps7-na.treca.org/admin/');

//get page source
$page = $session->getPage();

//enter the username
//$el = $page->find('css', '#logon_user');
//$el->setValue($user);

//enter the credentials
$el2 = $page->find('css', '#fieldPassword');
$el2->setValue($psCreds);

//press the Sign In button
$el3 = $page->find('css', '#btnEnter');
$el3->press();

//enter the credentials
$el2 = $page->find('css', '#ss.yui-ac-input');
$el2->setValue('hood');

//press the Search button
$el3 = $page->find('css', '#btnSearch.search');
$el3->press();

echo "\n\n";
?>

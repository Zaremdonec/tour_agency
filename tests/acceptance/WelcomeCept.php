<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('open home page');
$I->amOnPage('index.php');
$I->see("Tour agency");

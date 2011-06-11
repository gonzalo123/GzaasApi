<?php

// using phar archive
include 'Gzaas/Gzaas.phar';

// without phar
//include 'Gzaas/bootstrap.php';

use Gzaas\Api;

$gzaas = new Api();
// get random fonts, styles ans patterns
$font    = array_rand((array) Api\Fonts::factory()->getAll(Api::FEATURED));
$style   = array_rand((array) Api\Styles::factory()->getAll(Api::FEATURED));
$pattern = array_rand((array) Api\Patterns::factory()->getAll(Api::FEATURED));

echo "font: {$font} / style: {$style} / pattern: {$pattern}\n";
$gzaas->setApiKey('mySuperSecretApiKey')
        ->setFont($font)
        ->setBackPattern($pattern)
        ->setStyle($style)
        ->setColor('444444')
        ->setBackcolor('fcfcee')
        ->setShadows('1px 0 2px #ccc')
        ->setVisibility(0)
        ->setLauncher("testin gzaas API");

$url = $gzaas->create('Api Gzaas Rulez!');

echo "Gzaas created: {$url}\n";
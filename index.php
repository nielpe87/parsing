<?php 

require_once __DIR__ . "/vendor/autoload.php";


use Nielpe87\Parsing\Parser;

$encoder = new Parser;

$encoder->jsonEncode(['testing' => 'test']);

$bilboQuote = "It’s a dangerous business, Frodo, going out your door. You step "
            . "onto the road, and if you don't keep your feet, there’s no knowing "
            . "where you might be swept off to.";

$encoded = $encoder->base64UrlEncode($bilboQuote);


$decoded = $encoder->base64UrlDecode($encoded);

echo $encoded . PHP_EOL;
echo $decoded . PHP_EOL;

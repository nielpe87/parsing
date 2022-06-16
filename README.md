 # Object Signing and Encoding Parsing

A base64Url and JSON encoding/decoding implementation.

## Installation

Package is available on [Packagist](https://packagist.org/packages/nielpe87/parsing),
you can install it using [Composer](http://getcomposer.org).

```shell
composer require nielpe87/parsing
```

## Usage

You probably won't need to depend on this library directly.
However, feel free to use its base64url and JSON (with some extra validation) encoding/decoding.

### Encoding

```php
use Nielpe87\Parsing\Parser;

$bilboQuote = "It’s a dangerous business, Frodo, going out your door. You step "
            . "onto the road, and if you don't keep your feet, there’s no knowing "
            . "where you might be swept off to.";
            
$encoder = new Parser();
echo $encoder->jsonEncode(['testing' => 'test']); // {"testing":"test"}
echo $encoder->base64UrlEncode($bilboQuote);

/*
  That quote is used in RFC 7520 example (in UTF-8 encoding, sure),
  and the output is (line breaks added for readbility):

  SXTigJlzIGEgZGFuZ2Vyb3VzIGJ1c2luZXNzLCBGcm9kbywgZ29pbmcgb3V0IHlvdXIgZG9vci4gWW
  91IHN0ZXAgb250byB0aGUgcm9hZCwgYW5kIGlmIHlvdSBkb24ndCBrZWVwIHlvdXIgZmVldCwgdGhl
  cmXigJlzIG5vIGtub3dpbmcgd2hlcmUgeW91IG1pZ2h0IGJlIHN3ZXB0IG9mZiB0by4
 */ 
```

### Decoding

```php
use Nielpe87\Parsing\Parser;

$bilboQuote = "SXTigJlzIGEgZGFuZ2Vyb3VzIGJ1c2luZXNzLCBGcm9kbywgZ29pbmcgb3V0IHlvdXIgZG9vci4gWW"
            . "91IHN0ZXAgb250byB0aGUgcm9hZCwgYW5kIGlmIHlvdSBkb24ndCBrZWVwIHlvdXIgZmVldCwgdGhl"
            . "cmXigJlzIG5vIGtub3dpbmcgd2hlcmUgeW91IG1pZ2h0IGJlIHN3ZXB0IG9mZiB0by4";

$decoder = new Parser();
var_dump($decoder->jsonDecode('{"testing":"test"}')); // object(stdClass)#1 (1) { ["testing"] => string(4) "test" }
echo $decoder->base64UrlDecode($bilboQuote);

/*
  The output would be the same as the quote used in previous example:

  "It’s a dangerous business, Frodo, going out your door. You step " 
  "onto the road, and if you don't keep your feet, there’s no knowing " 
  "where you might be swept off to."
 */ 
```
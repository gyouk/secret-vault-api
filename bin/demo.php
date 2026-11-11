<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use App\Domain\SecretType;
use App\Domain\Secret;

var_dump(SecretType::from('api_key')->ttlDays()); // int(365)
var_dump(SecretType::tryFrom('foo'));          
var_dump(SecretType::Note->ttlDays());          // NULL


$s = new Secret('1', SecretType::Note, 'hello', new DateTimeImmutable(), null);
var_dump($s->isExpired(new DateTimeImmutable())); // bool(false)

try {
       $s->value = 'x';
   } catch (\Error $e) {
       echo 'OK, readonly works: ' . $e->getMessage() . PHP_EOL;
   }

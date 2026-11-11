<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use App\Domain\SecretType;

var_dump(SecretType::from('api_key')->ttlDays()); // int(365)
var_dump(SecretType::tryFrom('foo'));          
var_dump(SecretType::Note->ttlDays());          // NULL
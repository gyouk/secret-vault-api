<?php
declare(strict_types=1);
 
namespace App\Domain;

enum SecretType: string {
    case Password = 'password';
    case ApiKey = 'api_key';
    case Note = 'note';

    public function ttlDays(): ?int 
    {
        return match ($this) {
            self::Password => 90,
            self::ApiKey => 365,
            self::Note => null,
        };
    }
}
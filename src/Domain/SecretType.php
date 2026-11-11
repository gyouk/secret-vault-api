<?php
    declare(strict_types=1);

enum SecretType: string {
    case PASSWORD = 'password';
    case API_KEY = 'api_key';
    case NOTE = 'note';

    public function ttlDays(): int {
        return match($this) {
            self::PASSWORD => 90,
            self::API_KEY => 365,
            self::NOTE => 365,
        };
    }
}
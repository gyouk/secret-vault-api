<?php
declare(strict_types=1);

namespace App\Domain;

use DateTimeImmutable;

final readonly class Secret
{
    public function __construct(
        public string $id,
        public SecretType $type,
        public string $value,
        public DateTimeImmutable $createdAt,
        public ?DateTimeImmutable $expiresAt = null
    ) {
    }

    // expiresAt is the first moment the secret is no longer valid (same as JWT exp).
    public function isExpired(DateTimeImmutable $now): bool
    {
        return $this->expiresAt !== null && $now >= $this->expiresAt;
    }
}

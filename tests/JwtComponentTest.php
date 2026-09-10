<?php

declare(strict_types=1);

namespace YiiJwtAuthKeys\Tests;

use PHPUnit\Framework\TestCase;
use YiiJwtAuthKeys\JwtComponent;

final class JwtComponentTest extends TestCase
{
    public function testEncodeAndDecodeWithSecret(): void
    {
        $component = new JwtComponent();
        $component->secret = 'a-secure-secret-key-for-testing-purposes-2024!';
        $component->init();

        $token = $component->encode('payload');

        $this->assertNotSame('', $token);
        $this->assertSame('payload', $component->decode($token));
    }
}

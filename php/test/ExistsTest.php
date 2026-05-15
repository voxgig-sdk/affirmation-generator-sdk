<?php
declare(strict_types=1);

// AffirmationGenerator SDK exists test

require_once __DIR__ . '/../affirmationgenerator_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = AffirmationGeneratorSDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}

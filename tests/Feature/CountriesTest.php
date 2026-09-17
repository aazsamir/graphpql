<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;

class CountriesTest extends TestCase
{
    #[Test]
    public function testCountries(): void
    {
        $this->testProjectGeneration(
            'Countries',
            '\\Tests\\Feature\\Fixture\\Countries',
        );
    }
}
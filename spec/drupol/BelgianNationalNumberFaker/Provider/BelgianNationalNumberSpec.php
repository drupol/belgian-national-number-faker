<?php

declare(strict_types = 1);

namespace spec\drupol\BelgianNationalNumberFaker\Provider;

use drupol\BelgianNationalNumberFaker\Provider\BelgianNationalNumber;
use Faker\Generator;
use PhpSpec\ObjectBehavior;

class BelgianNationalNumberSpec extends ObjectBehavior
{
    public function it_can_generate_random_national_numbers(Generator $generator): void
    {
        $this->beConstructedWith($generator);

        $this
            ->belgianNationalIdentificationNumber()
            ->shouldBeString();
    }

    public function it_is_initializable(Generator $generator): void
    {
        $this->beConstructedWith($generator);

        $this->shouldHaveType(BelgianNationalNumber::class);
    }
}

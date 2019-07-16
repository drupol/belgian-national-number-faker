<?php

declare(strict_types = 1);

namespace spec\drupol\BelgianNationalNumberFaker\Validator;

use drupol\BelgianNationalNumberFaker\Validator\BelgianNationalNumberValidator;
use PhpSpec\ObjectBehavior;

class BelgianNationalNumberValidatorSpec extends ObjectBehavior
{
    public function it_can_check_if_a_number_is_valid_or_not(): void
    {
        $data = [
            '81041889503' => true,
            '75111515014' => true,
            '03103129473' => true,
            '1' => false,
            '111111111111' => false,
            '00000000000' => false,
            '01010101010' => false,
            '81-04-18-895.03' => true,
            '-----------' => false,
            '8.5' => false,
            '0' => false,
            '' => false,
            null => false,
            '10291188903' => false,
            '12345678901' => false,
            ' 8 1 0 4 1 8 8 9 5 0 3 ' => true,
            '81041800003' => false,
            '81041899903' => false,
            '81041899603' => false,
        ];

        foreach ($data as $id => $expected) {
            $this
                ->isValid($id)
                ->shouldReturn($expected);
        }
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(BelgianNationalNumberValidator::class);
    }
}

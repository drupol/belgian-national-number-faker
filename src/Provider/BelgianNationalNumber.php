<?php

declare(strict_types=1);

namespace drupol\BelgianNationalNumberFaker\Provider;

use drupol\BelgianNationalNumberFaker\Validator\BelgianNationalNumberValidator;
use Faker\Provider\Base;
use Faker\Provider\DateTime;

/**
 * Class BelgianNationalNumber.
 */
final class BelgianNationalNumber extends Base
{
    /**
     * Generate a random Belgian National Number.
     *
     * @return string
     *
     * @see https://en.wikipedia.org/wiki/National_identification_number
     */
    public function belgianNationalIdentificationNumber(): string
    {
        do {
            $probe = mb_substr(DateTime::date('Ymd'), 2) . self::randomNumber(5, true);
        } while (false === BelgianNationalNumberValidator::isValid($probe));

        return $probe;
    }
}

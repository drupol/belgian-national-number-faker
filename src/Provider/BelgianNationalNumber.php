<?php

declare(strict_types = 1);

namespace drupol\BelgianNationalNumberFaker\Provider;

use Faker\Provider\Base;
use Faker\Provider\DateTime;

/**
 * Class BelgianNationalNumber.
 */
class BelgianNationalNumber extends Base
{
    /**
     * Generate a random Belgian National Number.
     *
     * @return string
     *
     * @see https://en.wikipedia.org/wiki/National_identification_number
     */
    public function nationalIdentificationNumber(): string
    {
        do {
            $probe = \mb_substr(DateTime::date('Ymd'), 2) . static::randomNumber(5);
        } while (false === static::isValidNationalNumber($probe));

        return $probe;
    }

    /**
     * Check if the number is a valid national number.
     *
     * @param string $national_number
     *   The number.
     *
     * @return bool
     *   True if validated, false otherwise.
     */
    private static function isValidNationalNumber(string $national_number): bool
    {
        $national_number = \filter_var($national_number, \FILTER_SANITIZE_NUMBER_INT);

        if (false === $national_number) {
            return false;
        }

        $allowedCharactersPattern = '/^[0-9\\ \\-]+$/';
        $nonNumericPattern = '/\\D/';

        if (1 !== \preg_match($allowedCharactersPattern, $national_number)) {
            return false;
        }

        $national_number = \preg_replace($nonNumericPattern, '', $national_number);

        if (null === $national_number) {
            return false;
        }

        if (11 !== \mb_strlen($national_number)) {
            return false;
        }

        $birthDatePart = (int) \mb_substr($national_number, 0, 6);
        $counterPart = (int) \mb_substr($national_number, 6, 3);
        $controlPart = (int) \mb_substr($national_number, 9, 2);

        // 1. CONTROL NUMBER CHECKING
        $born2kOrLater = false;
        $calculatedControl = 97 - (($birthDatePart . $counterPart) % 97);

        if ($calculatedControl !== $controlPart) {
            $born2kOrLater = true;
            $calculatedControl = 97 - (('2' . $birthDatePart . $counterPart) % 97);

            if ($calculatedControl !== $controlPart) {
                return false;
            }
        }

        // 2. BIRTHDATE CHECKING
        $birthDate = true === $born2kOrLater ?
            '20' . $birthDatePart :
            '19' . $birthDatePart;

        if (!\checkdate(
            (int) \mb_substr($birthDate, 4, 2),
            (int) \mb_substr($birthDate, 6, 2),
            (int) \mb_substr($birthDate, 0, 4)
        )
        ) {
            return false;
        }

        // 3. COUNTER CHECKING
        if (1 > $counterPart || 997 < $counterPart) {
            return false;
        }

        return true;
    }
}

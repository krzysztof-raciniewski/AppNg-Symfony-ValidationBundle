<?php

namespace AppNg\Symfony\ValidationBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class ConstraintNipValidator
 * @package ValidationBundle\Validator
 */
class ConstraintNipValidator extends ConstraintValidator
{

    public function nipIsValid($number)
    {
        $number = preg_replace('/\s+/', '', $number);
        $number = str_replace('-', '', $number);

        if($number == '') {
            return true;
        }

        if (!preg_match('/^[\d]{10}$/', $number) || '0000000000' == $number) {
            return false;
        }

        $chars = str_split(trim($number));
        $sum = array_sum(array_map(function ($weight, $digit) {
            return $weight * $digit;
        }, [6, 5, 7, 2, 3, 4, 5, 6, 7], array_slice($chars, 0, 9)));
        $checksum = $sum % 11;

        return $checksum == $chars[9];
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$this->nipIsValid($value)) {
            $this->context->buildViolation($constraint->defaultErrorMessage)->addViolation();
        }
    }
}
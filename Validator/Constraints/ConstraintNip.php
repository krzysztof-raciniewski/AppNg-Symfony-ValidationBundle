<?php

namespace AppNg\Symfony\ValidationBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * Class ConstraintNip
 * @package ValidationBundle\Validator
 * @Annotation
 */
class ConstraintNip extends Constraint
{
    public $defaultErrorMessage = 'Numer NIP jest nieprawidłowy';
}
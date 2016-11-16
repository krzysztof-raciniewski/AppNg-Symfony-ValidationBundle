<?php

namespace PublicPageBundle\Tests\Controller;


use AppNg\Symfony\ValidationBundle\Validator\Constraints\ConstraintNipValidator;

class NipValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validNipArray = [
        '5268827052',
        '4695615050',
        '7338551433',
        '8362672282',
        '7972250432',
        '2140089886',
        '1295872095',
        '8323225946',
        '1540802815',
        '2179281762',
        '4678805919',
        '2338604546',
        '6266011861',
        '9767023397',
        '9917902486',
        '6892773475',
        '6883164417',
        '5124331207',
        '2614411573',
        '52-688-270-52',
        '46-95-61-50-50',
        '733-855-1433',
        '-836-267-228-2',
        '-7972250432-',
        '21-40-08-98-86',
        '129-5872-095',
        ' 5268827052 ',
        ' 4695615050',
        '7338551433 ',
        '836 2672282',
        '7972250 432',
        '214 0089886',
        '129587 2095',
        '8323 225946',
        '   15 40802815',
        ' 2179281762   ',
        '467 88059 19 ',
        '233 860 4546',
        '6266 011861',
    ];

    private $invalidNipArray = [
        '9268327052',
        '4695625050',
        '9334551433',
        '8363619282',
        '7972459432',
        '2140049886',
        '1255879095',
        '8323269946',
        '1540809815',
        '2179289762',
        '4678897919',
        '2333694546',
        '6263091861',
        '9763093397',
        '9913992486',
        '6892479475',
        '6883169411',
        '5124339201',
        '2614419571'
    ];

    public function testValidNipNumbers()
    {
        $validator = new ConstraintNipValidator();
        foreach($this->validNipArray as $nip) {
            self::assertTrue($validator->nipIsValid($nip));
        }
    }

    public function testInvalidNipNumbers()
    {
        $validator = new ConstraintNipValidator();
        foreach($this->invalidNipArray as $nip) {
            self::assertFalse($validator->nipIsValid($nip));
        }
    }
}

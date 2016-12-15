<?php

require_once __DIR__.'/../vendor/autoload.php';

use DiegoBrocanelli\Validators\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    const CPF_VALID   = '06671661570';
    const CPF_INVALID = '06716615999';

    protected $CPFValidator;

    public function setUp()
    {
        $this->CPFValidator = new CPF();
    }

    public function testValidCPF()
    {
        $this->assertEquals(true, $this->CPFValidator->isValid(self::CPF_VALID) );
    }

    public function testInvalidCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid(self::CPF_INVALID) );
    }

    public function testEmptyCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('') );
    }
    
    public function testZerosCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('0000000000') );
    }
    
    public function testOnesCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('11111111111') );
    }
    
    public function testTwosCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('22222222222') );
    }
    
    public function testTreesCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('33333333333') );
    }
    
    public function testForusCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('44444444444') );
    }
    
    public function testFivesCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('55555555555') );
    }
    
    public function testSixsCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('66666666666') );
    }
    
    public function testSevensCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('77777777777') );
    }
    
    public function testEigthsCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('88888888888') );
    }
    
    public function testNinesCPF()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('99999999999') );
    }

    public function testLessCharacter()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('99999') );
    }

    public function testAboveAllowed()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('999999999999999999') );
    }

    public function testSpecialCharacters()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('99.333-333*333@') );
    }

    public function testSCharacters()
    {
        $this->assertEquals(false, $this->CPFValidator->isValid('asdfghjklop') );
    }
}


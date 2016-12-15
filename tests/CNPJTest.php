<?php

require_once __DIR__.'/../vendor/autoload.php';

use DiegoBrocanelli\Validators\CNPJ;
use PHPUnit\Framework\TestCase;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class CNPJTest extends TestCase
{
    const CNPJ_VALID   = '23628662000106';
    const CNPJ_INVALID = '52222118000199';

    protected $CNPJValidator;

    public function setUp()
    {
        $this->CNPJValidator = new CNPJ();
    }

    public function testValidCNPJ()
    {
        $this->assertEquals(true, $this->CNPJValidator->isValid(self::CNPJ_VALID) );
    }

    public function testInvalidCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid(self::CNPJ_INVALID) );
    }

    public function testEmptyCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('') );
    }
    
    public function testZerosCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('00000000000000') );
    }
    
    public function testOnesCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('11111111111111') );
    }
    
    public function testTwosCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('22222222222222') );
    }
    
    public function testTreesCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('33333333333333') );
    }
    
    public function testForusCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('44444444444444') );
    }
    
    public function testFivesCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('55555555555555') );
    }
    
    public function testSixsCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('66666666666666') );
    }
    
    public function testSevensCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('77777777777777') );
    }
    
    public function testEigthsCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('88888888888888') );
    }
    
    public function testNinesCNPJ()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('99999999999999') );
    }

    public function testLessCharacter()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('99999') );
    }

    public function testAboveAllowed()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('999999999999999999') );
    }

    public function testSpecialCharacters()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('99.333-333*333@--23421--134,0') );
    }

    public function testCharacters()
    {
        $this->assertEquals(false, $this->CNPJValidator->isValid('asdfgtrebhytfe') );
    }
}

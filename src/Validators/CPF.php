<?php

namespace DiegoBrocanelli\Validators;

use Random\Validate\CPF\CPF as ValidateCPF;
use Zend\Validator\AbstractValidator;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class CPF extends AbstractValidator
{
    const INVALID_CPF = 'The given CPF information invalid.';

    protected $messageTemplates = array(
        self::INVALID_CPF => self::INVALID_CPF
    );

    private $blackList = array(
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
    );
    
    /**
     * Validating CPF
     *
     * @param  string  $cpf
     * @return boolean
     */
    public function isValid($cpf)
    {
        $cpf = str_replace(
            array(',','.','-'), 
            array('', '', ''), 
            $cpf
        );
        
        if(empty($cpf) || in_array($cpf, $this->blackList) || strlen($cpf) != 11){
            $this->error(self::INVALID_CPF);

            return false;
        }
        
        $CPFValidator = new ValidateCPF();

        if(!$CPFValidator->isValid($cpf)){
            $this->error(self::INVALID_CPF);

            return false;
        }

        return true;
    }
}

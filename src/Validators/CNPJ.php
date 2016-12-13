<?php

namespace DiegoBrocanelli\Validators;

use Random\Validate\CNPJ\CNPJ as ValidateCNPJ;
use Zend\Validator\AbstractValidator;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class CNPJ extends AbstractValidator
{
    const INVALID_CNPJ = 'The given CNPJ information invalid.';

    protected $messageTemplates = array(
        self::INVALID_CNPJ => self::INVALID_CNPJ
    );

    private $blackList = array(
        '00000000000000',
        '11111111111111',
        '22222222222222',
        '33333333333333',
        '44444444444444',
        '55555555555555',
        '66666666666666',
        '77777777777777',
        '88888888888888',
        '99999999999999',
    );
    
    /**
     * Validating CNPJ
     *
     * @param  string  $cnpj
     * @return boolean
     */
    public function isValid($cnpj)
    {
        $cnpj = $this->sanitizeString($cnpj);
        
        if(empty($cnpj) || in_array($cnpj, $this->blackList) || strlen($cnpj) != 14){
            $this->error(self::INVALID_CNPJ);

            return false;
        }
        $CNPJValidator = new ValidateCNPJ();
        
        if(!$CNPJValidator->isValid($cnpj)){
            $this->error(self::INVALID_CNPJ);

            return false;
        }

        return true;
    }
    
    /**
     * Remover ".", ",", "-", "/" da string.
     * 
     * @param string $value
     * @return string
     */
    private function sanitizeString($value)
    {
        $cnpj = str_replace(
            array(',','.','-', '/'), 
            array('', '', '', ''), 
            $value
        );
        
        return $cnpj;
    }
}

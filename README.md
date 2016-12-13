# Validators Zend Framework
Quem nunca teve a necessidade de validar CPF, CNPJ e data. Claro que a maioria, pois são informações muito comuns no dia a dia, o intuito deste reposiório é facilitar a validação no Zend Framework, tranzendo com isso mais agilidade em seu desenvolvimento.

Esta library, contempla:
   - CPF
   - CNPJ
   - Data (pt-br)

# Install

##### Composer

Packagists
```
composer require diego-brocanelli/validators-zf dev-master
```

Na raiz do projeto, execute o comando.
```
composer install
```

# Tests
```
php phpunit.phar tests/
```

# CPF Validator - Implementação na entity ZF .
```
$inputFilter->add(array(
                'name'     => 'cpf',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 11,
                            'max'      => 11,
                        ),
                    ),
                    array(
                        'name' => 'DiegoBrocanelli\Validators\CPF' // Inserir a namespace.
                    ),
                ),
            ));
```

# CNPJ Validator - Implementação na entity ZF .
```
$inputFilter->add(array(
                'name'     => 'cnpj',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 14,
                            'max'      => 14,
                        ),
                    ),
                    array(
                        'name' => 'DiegoBrocanelli\Validators\CNPJ' // Inserir a namespace.
                    ),
                ),
            ));
```
   
# To-do list  

* [X] CPF
* [X] CNPJ
* [ ] Date